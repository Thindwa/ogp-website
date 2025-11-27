<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingsResource\Pages;
use App\Filament\Resources\FooterSettingsResource\RelationManagers;
use App\Models\FooterSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterSettingsResource extends Resource
{
    protected static ?string $model = FooterSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square';
    protected static ?string $navigationLabel = 'Footer Settings';
    protected static ?string $modelLabel = 'Footer Settings';
    protected static ?string $pluralModelLabel = 'Footer Settings';
    protected static ?string $navigationGroup = 'General Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Organization Information')
                    ->schema([
                        Forms\Components\FileUpload::make('logo_image')
                            ->image()
                            ->directory('footer-images')
                            ->visibility('public')
                            ->label('Logo Image'),
                        Forms\Components\TextInput::make('logo_alt')
                            ->maxLength(255)
                            ->label('Logo Alt Text'),
                        Forms\Components\TextInput::make('organization_name')
                            ->maxLength(255)
                            ->label('Organization Name'),
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->label('Description')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->url()
                            ->maxLength(255)
                            ->label('Facebook URL')
                            ->placeholder('https://facebook.com/yourpage')
                            ->nullable()
                            ->dehydrateStateUsing(function ($state) {
                                if (empty($state)) {
                                    return null;
                                }
                                if (!preg_match('/^https?:\/\//', $state)) {
                                    return 'https://' . $state;
                                }
                                return $state;
                            }),
                        Forms\Components\TextInput::make('twitter_url')
                            ->url()
                            ->maxLength(255)
                            ->label('Twitter URL')
                            ->placeholder('https://twitter.com/yourhandle')
                            ->nullable()
                            ->dehydrateStateUsing(function ($state) {
                                if (empty($state)) {
                                    return null;
                                }
                                if (!preg_match('/^https?:\/\//', $state)) {
                                    return 'https://' . $state;
                                }
                                return $state;
                            }),
                        Forms\Components\TextInput::make('linkedin_url')
                            ->url()
                            ->maxLength(255)
                            ->label('LinkedIn URL')
                            ->placeholder('https://linkedin.com/company/yourcompany')
                            ->nullable()
                            ->dehydrateStateUsing(function ($state) {
                                if (empty($state)) {
                                    return null;
                                }
                                if (!preg_match('/^https?:\/\//', $state)) {
                                    return 'https://' . $state;
                                }
                                return $state;
                            }),
                        Forms\Components\TextInput::make('youtube_url')
                            ->url()
                            ->maxLength(255)
                            ->label('YouTube URL')
                            ->placeholder('https://youtube.com/@yourchannel')
                            ->nullable()
                            ->dehydrateStateUsing(function ($state) {
                                if (empty($state)) {
                                    return null;
                                }
                                if (!preg_match('/^https?:\/\//', $state)) {
                                    return 'https://' . $state;
                                }
                                return $state;
                            }),
                    ])->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->label('Address'),
                        Forms\Components\TextInput::make('address_detail')
                            ->maxLength(255)
                            ->label('Address Detail (e.g., Building, Floor)'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->label('Email Address'),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255)
                            ->label('Phone Number'),
                        Forms\Components\TextInput::make('website')
                            ->url()
                            ->maxLength(255)
                            ->label('Website URL')
                            ->helperText('Enter full URL (e.g., https://www.ogp.mw)')
                            ->dehydrateStateUsing(function ($state) {
                                if (!empty($state) && !preg_match('/^https?:\/\//', $state)) {
                                    return 'https://' . $state;
                                }
                                return $state;
                            }),
                    ])->columns(2),

                Forms\Components\Section::make('Quick Links')
                    ->description('Add links that will appear in the Quick Links section of the footer')
                    ->schema([
                        Forms\Components\Repeater::make('quick_links')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->maxLength(255)
                                    ->label('Link Title')
                                    ->placeholder('Enter link title (e.g., About OGP)'),
                                Forms\Components\TextInput::make('url')
                                    ->maxLength(255)
                                    ->label('Link URL')
                                    ->placeholder('Enter URL (e.g., /about or https://example.com)')
                                    ->nullable(),
                            ])
                            ->columns(2)
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->default(function ($record, $get) {
                                // Get default links
                                $defaultLinks = [
                                    [
                                        'title' => 'About OGP',
                                        'url' => route('about'),
                                    ],
                                    [
                                        'title' => 'Working Groups',
                                        'url' => route('technical.group'),
                                    ],
                                    [
                                        'title' => 'Achievements',
                                        'url' => route('achievements'),
                                    ],
                                    [
                                        'title' => 'Documents',
                                        'url' => route('documents'),
                                    ],
                                    [
                                        'title' => 'Events',
                                        'url' => route('events'),
                                    ],
                                    [
                                        'title' => 'Gallery',
                                        'url' => route('gallery'),
                                    ],
                                ];

                                // If editing existing record, try to get from database
                                if ($record && $record->exists) {
                                    // Reload the record to ensure we have fresh data
                                    $record->refresh();
                                    if (!empty($record->quick_links) && is_array($record->quick_links)) {
                                        return $record->quick_links;
                                    }
                                }

                                // Check if there's already a value in the form state
                                $existingValue = $get('quick_links');
                                if (!empty($existingValue) && is_array($existingValue)) {
                                    return $existingValue;
                                }

                                // Return defaults if nothing exists
                                return $defaultLinks;
                            })
                            ->afterStateHydrated(function ($component, $state, $record) {
                                // When loading from database, ensure we have data
                                if ($record && $record->exists && empty($state)) {
                                    $defaultLinks = [
                                        [
                                            'title' => 'About OGP',
                                            'url' => route('about'),
                                        ],
                                        [
                                            'title' => 'Working Groups',
                                            'url' => route('technical.group'),
                                        ],
                                        [
                                            'title' => 'Achievements',
                                            'url' => route('achievements'),
                                        ],
                                        [
                                            'title' => 'Documents',
                                            'url' => route('documents'),
                                        ],
                                        [
                                            'title' => 'News',
                                            'url' => route('news'),
                                        ],
                                        [
                                            'title' => 'Gallery',
                                            'url' => route('gallery'),
                                        ],
                                    ];

                                    // If record has quick_links, use them; otherwise use defaults
                                    if (!empty($record->quick_links) && is_array($record->quick_links)) {
                                        $component->state($record->quick_links);
                                    } else {
                                        $component->state($defaultLinks);
                                    }
                                } elseif (empty($state)) {
                                    // For new records, set defaults
                                    $component->state([
                                        [
                                            'title' => 'About OGP',
                                            'url' => route('about'),
                                        ],
                                        [
                                            'title' => 'Working Groups',
                                            'url' => route('technical.group'),
                                        ],
                                        [
                                            'title' => 'Achievements',
                                            'url' => route('achievements'),
                                        ],
                                        [
                                            'title' => 'Documents',
                                            'url' => route('documents'),
                                        ],
                                        [
                                            'title' => 'News',
                                            'url' => route('news'),
                                        ],
                                        [
                                            'title' => 'Gallery',
                                            'url' => route('gallery'),
                                        ],
                                    ]);
                                }
                            })
                            ->defaultItems(6)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->label('Active')
                            ->helperText('Only active footer settings will be displayed on the website'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_image')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('organization_name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-o-envelope'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->icon('heroicon-o-phone'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSettings::route('/create'),
            'edit' => Pages\EditFooterSettings::route('/{record}/edit'),
        ];
    }
}
