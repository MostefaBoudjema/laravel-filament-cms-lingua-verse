<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('General Information')
                    ->schema([
                        \Filament\Schemas\Components\Tabs::make('Translations')
                            ->tabs([
                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('title.en')
                                            ->label('Title')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                        \Filament\Schemas\Components\RichEditor::make('description.en')
                                            ->label('Description')
                                            ->required(),
                                        \Filament\Schemas\Components\TagsInput::make('features.en')
                                            ->label('Features'),
                                    ]),
                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('title.ar')
                                            ->label('العنوان')
                                            ->required(),
                                        \Filament\Schemas\Components\RichEditor::make('description.ar')
                                            ->label('الوصف')
                                            ->required(),
                                        \Filament\Schemas\Components\TagsInput::make('features.ar')
                                            ->label('المميزات'),
                                    ]),
                            ]),
                        \Filament\Schemas\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        \Filament\Schemas\Components\TextInput::make('icon')
                            ->label('Heroicon (e.g. heroicon-o-academic-cap)'),
                        \Filament\Schemas\Components\FileUpload::make('image')
                            ->image()
                            ->directory('services'),
                        \Filament\Schemas\Components\Toggle::make('is_active')
                            ->default(true),
                        \Filament\Schemas\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
