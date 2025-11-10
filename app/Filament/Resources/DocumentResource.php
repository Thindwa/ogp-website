<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'My TWG Content';
    protected static ?string $navigationLabel = 'Documents';
    protected static ?string $modelLabel = 'Document';
    protected static ?string $pluralModelLabel = 'Documents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Document Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('technical_working_group_id')
                            ->relationship('technicalWorkingGroup', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->default(function () {
                                $user = auth()->user();
                                if ($user->isTWGManager()) {
                                    return $user->technical_working_group_id;
                                }
                                return null;
                            })
                            ->disabled(function () {
                                $user = auth()->user();
                                return $user->isTWGManager();
                            }),
                        Forms\Components\Textarea::make('description')
                            ->rows(3),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Speeches' => 'Speeches',
                                'Annual Reports' => 'Annual Reports',
                                'Policy Documents' => 'Policy Documents',
                                'Meeting Minutes' => 'Meeting Minutes',
                                'Other' => 'Other',
                            ])
                            ->searchable(),
                    ])->columns(2),

                Forms\Components\Section::make('File Upload')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->required()
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->directory('documents')
                            ->visibility('public')
                            ->maxSize(10240), // 10MB
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_public')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                // TWG managers can only see their TWG's documents
                if ($user->isTWGManager()) {
                    $query->where('technical_working_group_id', $user->technical_working_group_id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('technicalWorkingGroup.name')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Speeches' => 'success',
                        'Annual Reports' => 'info',
                        'Policy Documents' => 'warning',
                        'Meeting Minutes' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('file_type')
                    ->label('Type')
                    ->badge(),
                Tables\Columns\TextColumn::make('download_count')
                    ->label('Downloads')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_public')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Speeches' => 'Speeches',
                        'Annual Reports' => 'Annual Reports',
                        'Policy Documents' => 'Policy Documents',
                        'Meeting Minutes' => 'Meeting Minutes',
                        'Other' => 'Other',
                    ]),
                Tables\Filters\TernaryFilter::make('is_public')
                    ->label('Public Status'),
                Tables\Filters\SelectFilter::make('technical_working_group_id')
                    ->relationship('technicalWorkingGroup', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Document $record): string => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
