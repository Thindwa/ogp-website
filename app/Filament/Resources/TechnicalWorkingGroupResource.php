<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnicalWorkingGroupResource\Pages;
use App\Filament\Resources\TechnicalWorkingGroupResource\RelationManagers;
use App\Models\TechnicalWorkingGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechnicalWorkingGroupResource extends Resource
{
    protected static ?string $model = TechnicalWorkingGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Technical Working Groups';
    protected static ?string $modelLabel = 'Technical Working Group';
    protected static ?string $pluralModelLabel = 'Technical Working Groups';
    protected static ?string $navigationGroup = 'Technical Working Groups';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                            ),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(TechnicalWorkingGroup::class, 'slug', ignoreRecord: true),
                        Forms\Components\Textarea::make('short_description')
                            ->maxLength(500)
                            ->rows(3),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(5),
                    ])->columns(2),

                Forms\Components\Section::make('Visual & Branding')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->maxLength(255)
                            ->helperText('Icon class or image path'),
                        Forms\Components\ColorPicker::make('color')
                            ->default('#1bbd36'),
                        Forms\Components\FileUpload::make('featured_image')
                            ->image()
                            ->directory('twg-images')
                            ->visibility('public'),
                    ])->columns(3),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\Textarea::make('co_chairs')
                            ->label('Co-chairs')
                            ->helperText('Enter PS\' and CSO chairs (e.g., "PS Name (Government) and CSO Name (Civil Society)")')
                            ->rows(2),
                        Forms\Components\TextInput::make('contact_person')
                            ->maxLength(255)
                            ->helperText('Legacy field - use Co-chairs instead'),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->maxLength(255),
                    ])->columns(1),

                Forms\Components\Section::make('Content')
                    ->description('Order: Issues, Objectives, Commitments')
                    ->schema([
                        Forms\Components\Repeater::make('issues')
                            ->schema([
                                Forms\Components\TextInput::make('issue')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible()
                            ->label('Issues'),
                        Forms\Components\Repeater::make('objectives')
                            ->schema([
                                Forms\Components\TextInput::make('objective')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible(),
                        Forms\Components\Repeater::make('commitments')
                            ->schema([
                                Forms\Components\TextInput::make('commitment')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible()
                            ->label('Commitments'),
                        Forms\Components\Repeater::make('interventions')
                            ->schema([
                                Forms\Components\TextInput::make('intervention')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible()
                            ->label('Interventions (Legacy - use Commitments instead)'),
                    ])->columns(1),

                Forms\Components\Section::make('Time Range')
                    ->description('Set the date range for when this TWG was/is active. This determines if it appears in Current or Past TWGs.')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Start Date')
                            ->helperText('When did this TWG start?'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('End Date')
                            ->helperText('When did this TWG end? Leave empty if still active.')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Is Active')
                            ->helperText('When disabled, this TWG will be archived and appear in the Past Working Groups section')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = auth()->user();

                // TWG managers can only see their assigned TWG
                if ($user->isTWGManager()) {
                    $query->where('id', $user->technical_working_group_id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->label('Start Date'),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable()
                    ->label('End Date')
                    ->placeholder('Active'),
                Tables\Columns\TextColumn::make('date_range')
                    ->label('Date Range')
                    ->getStateUsing(fn ($record) => $record->date_range ?? 'Not set'),
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
                Tables\Filters\Filter::make('current')
                    ->label('Current TWGs')
                    ->query(fn ($query) => $query->current()),
                Tables\Filters\Filter::make('archived')
                    ->label('Archived TWGs')
                    ->query(fn ($query) => $query->archived()),
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
            'index' => Pages\ListTechnicalWorkingGroups::route('/'),
            'create' => Pages\CreateTechnicalWorkingGroup::route('/create'),
            'edit' => Pages\EditTechnicalWorkingGroup::route('/{record}/edit'),
        ];
    }
}
