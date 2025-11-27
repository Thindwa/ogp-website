<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'General Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Section::make('Page Header')
                //     ->schema([
                //         Forms\Components\TextInput::make('title')
                //             ->maxLength(255)
                //             ->label('Title'),
                //         Forms\Components\TextInput::make('subtitle')
                //             ->maxLength(255)
                //             ->label('Subtitle'),
                //         Forms\Components\Textarea::make('description')
                //             ->rows(3)
                //             ->label('Description'),
                //         Forms\Components\FileUpload::make('featured_image')
                //             ->image()
                //             ->directory('about-images')
                //             ->visibility('public')
                //             ->label('Featured Image'),
                //     ])->columns(2),

                Forms\Components\Section::make('OGP Global')
                    ->schema([
                        Forms\Components\TextInput::make('ogp_global_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('ogp_global_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('ogp_global_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('ogp_global_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\Textarea::make('content')
                            ->rows(4)
                            ->label('Main Content')
                            ->helperText('This content appears in the card section below the OGP Global title')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('ogp_global_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                        Forms\Components\FileUpload::make('ogp_global_image')
                            ->image()
                            ->directory('about-images')
                            ->visibility('public'),
                    ])->columns(2),

                Forms\Components\Section::make('Who is in OGP?')
                    ->schema([
                        Forms\Components\TextInput::make('who_is_ogp_title')
                            ->maxLength(255)
                            ->label('Title')
                            ->helperText('Main section title (e.g., "Who is in OGP?")'),
                        Forms\Components\Textarea::make('who_is_ogp_content')
                            ->rows(6)
                            ->label('Content')
                            ->helperText('This content appears in the dark card with the globe icon. Supports HTML formatting.')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('who_is_ogp_description')
                            ->rows(3)
                            ->label('Description')
                            ->helperText('Optional additional description'),
                    ])->columns(2),

                Forms\Components\Section::make('How Does OGP Work?')
                    ->schema([
                        Forms\Components\TextInput::make('how_ogp_works_title')
                            ->maxLength(255)
                            ->label('Title')
                            ->helperText('Title for the "How Does OGP Work?" card'),
                        Forms\Components\Textarea::make('how_ogp_works_content')
                            ->rows(6)
                            ->label('Content')
                            ->helperText('Content that appears in the white card with the cogs icon')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('how_ogp_works_description')
                            ->rows(3)
                            ->label('Description')
                            ->helperText('Optional additional description'),
                    ])->columns(2),

                Forms\Components\Section::make('When Did Malawi Join OGP?')
                    ->schema([
                        Forms\Components\TextInput::make('malawi_ogp_title')
                            ->maxLength(255)
                            ->label('Title')
                            ->helperText('Title for the "When Did Malawi Join OGP?" card'),
                        Forms\Components\Textarea::make('malawi_ogp_content')
                            ->rows(6)
                            ->label('Content')
                            ->helperText('Content that appears in the white card with the flag icon. Supports HTML formatting.')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('malawi_ogp_description')
                            ->rows(3)
                            ->label('Description')
                            ->helperText('Optional description that can appear in a quote section'),
                    ])->columns(2),

                Forms\Components\Section::make('National Steering Committee')
                    ->schema([
                        Forms\Components\TextInput::make('steering_committee_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('steering_committee_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('steering_committee_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('steering_committee_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\TextInput::make('steering_committee_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                    ])->columns(2),

                Forms\Components\Section::make('Steering Committee Membership')
                    ->description('Manage the membership of the National Steering Committee')
                    ->schema([
                        Forms\Components\Repeater::make('gov_institutions_temp')
                            ->label('Government Institutions')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Institution Name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->addActionLabel('Add Government Institution')
                            ->helperText('List all government institutions that are members of the Steering Committee')
                            ->reorderable()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                                static::updateMembershipField($set, $get);
                            })
                            ->dehydrated(false),
                        Forms\Components\Repeater::make('cso_organizations_temp')
                            ->label('Civil Society Organizations')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Organization Name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->addActionLabel('Add Civil Society Organization')
                            ->helperText('List all civil society organizations that are members of the Steering Committee')
                            ->reorderable()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                                static::updateMembershipField($set, $get);
                            })
                            ->dehydrated(false),
                        Forms\Components\Repeater::make('ex_officio_temp')
                            ->label('Ex-Officio Members')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Member Name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->defaultItems(0)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->addActionLabel('Add Ex-Officio Member')
                            ->helperText('List any ex-officio members (optional)')
                            ->reorderable()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                                static::updateMembershipField($set, $get);
                            })
                            ->dehydrated(false),
                        Forms\Components\Hidden::make('steering_committee_membership')
                            ->afterStateHydrated(function (Forms\Set $set, Forms\Get $get, $state) {
                                // Initialize temp fields from existing membership data
                                if (is_array($state) && !empty($state)) {
                                    if (isset($state['government_institutions'])) {
                                        $set('gov_institutions_temp', array_map(fn($item) => ['name' => is_string($item) ? $item : ($item['name'] ?? $item)], $state['government_institutions']));
                                    }
                                    if (isset($state['civil_society_organizations'])) {
                                        $set('cso_organizations_temp', array_map(fn($item) => ['name' => is_string($item) ? $item : ($item['name'] ?? $item)], $state['civil_society_organizations']));
                                    }
                                    if (isset($state['ex_officio_members'])) {
                                        $set('ex_officio_temp', array_map(fn($item) => ['name' => is_string($item) ? $item : ($item['name'] ?? $item)], $state['ex_officio_members']));
                                    }
                                }
                            }),
                    ])->columns(1),

                Forms\Components\Section::make('Malawi National Action Plan')
                    ->schema([
                        Forms\Components\TextInput::make('action_plan_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('action_plan_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('action_plan_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('action_plan_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\TextInput::make('action_plan_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                    ])->columns(2),

                Forms\Components\Section::make('Secretariat')
                    ->schema([
                        Forms\Components\TextInput::make('secretariat_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('secretariat_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('secretariat_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('secretariat_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\TextInput::make('secretariat_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                    ])->columns(2),

                Forms\Components\Section::make('Technical Working Groups')
                    ->schema([
                        Forms\Components\TextInput::make('technical_working_groups_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('technical_working_groups_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('technical_working_groups_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('technical_working_groups_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\TextInput::make('technical_working_groups_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                        Forms\Components\KeyValue::make('technical_working_groups_list')
                            ->label('Technical Working Groups List')
                            ->keyLabel('Number')
                            ->valueLabel('Title')
                            ->helperText('Add TWG list (e.g., 1: Open Parliament)'),
                    ])->columns(2),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
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
            ]);
    }

    protected static function updateMembershipField(Forms\Set $set, Forms\Get $get): void
    {
        $membership = [];

        $govInstitutions = $get('gov_institutions_temp') ?? [];
        if (is_array($govInstitutions)) {
            $membership['government_institutions'] = array_values(array_filter(array_map(function ($item) {
                if (empty($item) || !is_array($item)) return null;
                return $item['name'] ?? null;
            }, $govInstitutions)));
        }

        $csoOrganizations = $get('cso_organizations_temp') ?? [];
        if (is_array($csoOrganizations)) {
            $membership['civil_society_organizations'] = array_values(array_filter(array_map(function ($item) {
                if (empty($item) || !is_array($item)) return null;
                return $item['name'] ?? null;
            }, $csoOrganizations)));
        }

        $exOfficio = $get('ex_officio_temp') ?? [];
        if (is_array($exOfficio)) {
            $membership['ex_officio_members'] = array_values(array_filter(array_map(function ($item) {
                if (empty($item) || !is_array($item)) return null;
                return $item['name'] ?? null;
            }, $exOfficio)));
        }

        $set('steering_committee_membership', $membership);
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
