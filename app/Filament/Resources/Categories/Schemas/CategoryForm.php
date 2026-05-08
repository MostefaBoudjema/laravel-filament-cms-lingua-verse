<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Category Details')
                    ->schema([
                        \Filament\Schemas\Components\Tabs::make('Translations')
                            ->tabs([
                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('name.en')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                        \Filament\Schemas\Components\Textarea::make('description.en'),
                                    ]),
                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('name.ar')
                                            ->required(),
                                        \Filament\Schemas\Components\Textarea::make('description.ar'),
                                    ]),
                            ]),
                        \Filament\Schemas\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ]);
    }
}
