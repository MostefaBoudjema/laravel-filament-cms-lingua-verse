<?php

namespace App\Filament\Resources\QuoteRequests\Schemas;

use Filament\Schemas\Schema;

class QuoteRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Customer Information')
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('name')->required(),
                        \Filament\Schemas\Components\TextInput::make('email')->email()->required(),
                        \Filament\Schemas\Components\TextInput::make('phone'),
                        \Filament\Schemas\Components\TextInput::make('company'),
                    ])->columns(2),
                \Filament\Schemas\Components\Section::make('Project Details')
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('source_language')->required(),
                        \Filament\Schemas\Components\TextInput::make('target_language')->required(),
                        \Filament\Schemas\Components\TextInput::make('service_type')->required(),
                        \Filament\Schemas\Components\FileUpload::make('attachment')
                            ->directory('quotes'),
                        \Filament\Schemas\Components\Textarea::make('message')
                            ->columnSpanFull(),
                    ])->columns(3),
                \Filament\Schemas\Components\Section::make('Admin Management')
                    ->schema([
                        \Filament\Schemas\Components\Select::make('status')
                            ->options([
                                'new' => 'New',
                                'in_progress' => 'In Progress',
                                'quoted' => 'Quoted',
                                'completed' => 'Completed',
                            ])
                            ->default('new')
                            ->required(),
                        \Filament\Schemas\Components\Textarea::make('admin_notes')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
