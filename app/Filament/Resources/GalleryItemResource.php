<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryItemResource\Pages;
use App\Filament\Resources\GalleryItemResource\RelationManagers;
use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'My TWG Content';
    protected static ?string $navigationLabel = 'Gallery';
    protected static ?string $modelLabel = 'Gallery Item';
    protected static ?string $pluralModelLabel = 'Gallery Items';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Gallery Item Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('technical_working_group_id')
                            ->relationship('technicalWorkingGroup', 'name')
                            ->required(fn () => auth()->user()->isTWGManager())
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
                            })
                            ->helperText(function () {
                                $user = auth()->user();
                                if ($user->isTWGManager()) {
                                    return 'This field is required for TWG managers.';
                                }
                                return 'Optional: Leave blank for general content not associated with a specific TWG.';
                            }),
                        Forms\Components\Textarea::make('description')
                            ->rows(3),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Events' => 'Events',
                                'Meetings' => 'Meetings',
                                'Workshops' => 'Workshops',
                                'Conferences' => 'Conferences',
                                'Other' => 'Other',
                            ])
                            ->searchable(),
                    ])->columns(2),

                Forms\Components\Section::make('Image Upload')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->collection('gallery')
                            ->required()
                            ->image()
                            ->maxSize(5120)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'pending' => 'Pending Review',
                                'published' => 'Published',
                            ])
                            ->default(function () {
                                $user = auth()->user();
                                // TWG managers can only set to draft or pending
                                if ($user->isTWGManager()) {
                                    return 'pending';
                                }
                                return 'draft';
                            })
                            ->required()
                            ->disabled(function () {
                                $user = auth()->user();
                                // Only admins can publish
                                return $user->isTWGManager();
                            })
                            ->helperText(function () {
                                $user = auth()->user();
                                if ($user->isTWGManager()) {
                                    return 'Your gallery item will be submitted for admin review. Only admins can publish.';
                                }
                                return 'Set the publication status of this gallery item.';
                            }),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->helperText('Note: Item will only be visible on frontend when status is "Published".'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                // TWG managers can only see their TWG's gallery items
                if ($user->isTWGManager()) {
                    $query->where('technical_working_group_id', $user->technical_working_group_id);
                }
            })
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('gallery')
                    ->collection('gallery')
                    ->square()
                    ->size(60),
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
                        'Events' => 'success',
                        'Meetings' => 'info',
                        'Workshops' => 'warning',
                        'Conferences' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'pending' => 'warning',
                        'draft' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Events' => 'Events',
                        'Meetings' => 'Meetings',
                        'Workshops' => 'Workshops',
                        'Conferences' => 'Conferences',
                        'Other' => 'Other',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending' => 'Pending Review',
                        'published' => 'Published',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
                Tables\Filters\SelectFilter::make('technical_working_group_id')
                    ->relationship('technicalWorkingGroup', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
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
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
