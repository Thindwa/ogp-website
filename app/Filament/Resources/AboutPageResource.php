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
                //             ->required(),
                //         Forms\Components\TextInput::make('subtitle')
                //             ->maxLength(255),
                //         Forms\Components\Textarea::make('description')
                //             ->rows(3),
                //         Forms\Components\FileUpload::make('featured_image')
                //             ->image()
                //             ->directory('about-images')
                //             ->visibility('public'),
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
                        Forms\Components\TextInput::make('ogp_global_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                        Forms\Components\FileUpload::make('ogp_global_image')
                            ->image()
                            ->directory('about-images')
                            ->visibility('public'),
                    ])->columns(2),

                Forms\Components\Section::make('OGP in Malawi Timeline')
                    ->schema([
                        Forms\Components\TextInput::make('malawi_timeline_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\TextInput::make('malawi_timeline_subtitle')
                            ->maxLength(255)
                            ->label('Subtitle'),
                        Forms\Components\Textarea::make('malawi_timeline_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('malawi_timeline_description')
                            ->rows(3)
                            ->label('Description'),
                        Forms\Components\TextInput::make('malawi_timeline_icon')
                            ->maxLength(255)
                            ->label('Icon (FontAwesome class)'),
                        Forms\Components\KeyValue::make('malawi_timeline_data')
                            ->label('Timeline Data')
                            ->keyLabel('Year')
                            ->valueLabel('Description')
                            ->helperText('Add timeline entries (e.g., 2013: Malawi Joins OGP)'),
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
                        Forms\Components\Textarea::make('steering_committee_membership')
                            ->label('Steering Committee Membership (JSON)')
                            ->rows(8)
                            ->helperText('Enter membership data in JSON format. This will be automatically populated from the seeder.'),
                    ])->columns(2),

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
