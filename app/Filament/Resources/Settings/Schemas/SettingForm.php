<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Configuration')
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->disabled(fn ($record) => $record !== null), // Prevent changing key once created
                        \Filament\Schemas\Components\Tabs::make('Translations')
                            ->tabs([
                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        \Filament\Schemas\Components\Textarea::make('value.en')
                                            ->label('Value (EN)'),
                                    ]),
                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                    ->schema([
                                        \Filament\Schemas\Components\Textarea::make('value.ar')
                                            ->label('Value (AR)'),
                                    ]),
                            ]),
                        \Filament\Schemas\Components\TextInput::make('group')
                            ->default('general')
                            ->required(),
                    ]),
            ]);
    }
}
