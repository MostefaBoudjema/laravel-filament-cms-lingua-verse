<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Inquiry Details')
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('name')->required(),
                        \Filament\Schemas\Components\TextInput::make('email')->email()->required(),
                        \Filament\Schemas\Components\TextInput::make('phone'),
                        \Filament\Schemas\Components\TextInput::make('subject')->required(),
                        \Filament\Schemas\Components\Textarea::make('message')
                            ->required()
                            ->columnSpanFull(),
                        \Filament\Schemas\Components\Toggle::make('is_read')
                            ->label('Mark as Read'),
                    ])->columns(2),
            ]);
    }
}
