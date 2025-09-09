<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Filament\Resources\HomePageResource\RelationManagers;
use App\Models\HomePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Home Page';
    protected static ?string $modelLabel = 'Home Page';
    protected static ?string $pluralModelLabel = 'Home Pages';
    protected static ?string $navigationGroup = 'General Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hero_subtitle')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('hero_description')
                            ->rows(3),
                        Forms\Components\FileUpload::make('hero_image')
                            ->image()
                            ->directory('home-images')
                            ->visibility('public'),
                    ])->columns(2),

                Forms\Components\Section::make('About Section')
                    ->schema([
                        Forms\Components\TextInput::make('about_title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('about_description')
                            ->rows(4),
                        Forms\Components\FileUpload::make('about_image')
                            ->image()
                            ->directory('home-images')
                            ->visibility('public'),
                    ])->columns(2),

                Forms\Components\Section::make('OGP Section')
                    ->schema([
                        Forms\Components\TextInput::make('ogp_title')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('ogp_description')
                            ->rows(4),
                        Forms\Components\FileUpload::make('ogp_image')
                            ->image()
                            ->directory('home-images')
                            ->visibility('public'),
                    ])->columns(2),

                Forms\Components\Section::make('Mission & Vision')
                    ->schema([
                        Forms\Components\TextInput::make('mission_title')
                            ->maxLength(255)
                            ->label('Mission Title'),
                        Forms\Components\TextInput::make('mission_subtitle')
                            ->maxLength(255)
                            ->label('Mission Subtitle'),
                        Forms\Components\Textarea::make('mission_content')
                            ->rows(4)
                            ->label('Mission Content'),
                        Forms\Components\Textarea::make('mission_description')
                            ->rows(3)
                            ->label('Mission Description'),
                        Forms\Components\TextInput::make('mission_icon')
                            ->maxLength(255)
                            ->label('Mission Icon (FontAwesome class)'),

                        Forms\Components\TextInput::make('vision_title')
                            ->maxLength(255)
                            ->label('Vision Title'),
                        Forms\Components\TextInput::make('vision_subtitle')
                            ->maxLength(255)
                            ->label('Vision Subtitle'),
                        Forms\Components\Textarea::make('vision_content')
                            ->rows(4)
                            ->label('Vision Content'),
                        Forms\Components\Textarea::make('vision_description')
                            ->rows(3)
                            ->label('Vision Description'),
                        Forms\Components\TextInput::make('vision_icon')
                            ->maxLength(255)
                            ->label('Vision Icon (FontAwesome class)'),
                    ])->columns(2),

                Forms\Components\Section::make('Who is in OGP?')
                    ->schema([
                        Forms\Components\TextInput::make('who_is_ogp_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('who_is_ogp_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('who_is_ogp_description')
                            ->rows(3)
                            ->label('Description'),
                    ])->columns(1),

                Forms\Components\Section::make('How Does OGP Work?')
                    ->schema([
                        Forms\Components\TextInput::make('how_ogp_works_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('how_ogp_works_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('how_ogp_works_description')
                            ->rows(3)
                            ->label('Description'),
                    ])->columns(1),

                Forms\Components\Section::make('When Did Malawi Join OGP?')
                    ->schema([
                        Forms\Components\TextInput::make('malawi_ogp_title')
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('malawi_ogp_content')
                            ->rows(4)
                            ->label('Content'),
                        Forms\Components\Textarea::make('malawi_ogp_description')
                            ->rows(3)
                            ->label('Description'),
                    ])->columns(1),

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
                Tables\Columns\TextColumn::make('hero_title')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('about_title')
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }
}
