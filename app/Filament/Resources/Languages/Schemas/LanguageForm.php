<?php

namespace App\Filament\Resources\Languages\Schemas;

use Filament\Schemas\Schema;

class LanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Language Details')
                    ->schema([
                        \Filament\Schemas\Components\Tabs::make('Translations')
                            ->tabs([
                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('name.en')
                                            ->label('Name')
                                            ->required(),
                                        \Filament\Schemas\Components\Textarea::make('description.en')
                                            ->label('Description'),
                                    ]),
                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('name.ar')
                                            ->label('الاسم')
                                            ->required(),
                                        \Filament\Schemas\Components\Textarea::make('description.ar')
                                            ->label('الوصف'),
                                    ]),
                            ]),
                        \Filament\Schemas\Components\TextInput::make('code')
                            ->required()
                            ->unique(ignoreRecord: true),
                        \Filament\Schemas\Components\FileUpload::make('flag')
                            ->image()
                            ->directory('languages'),
                        \Filament\Schemas\Components\Toggle::make('is_active')
                            ->default(true),
                        \Filament\Schemas\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
