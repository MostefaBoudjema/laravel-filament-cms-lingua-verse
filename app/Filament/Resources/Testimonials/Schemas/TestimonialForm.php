<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Client Information')
                    ->schema([
                        \Filament\Schemas\Components\Tabs::make('Translations')
                            ->tabs([
                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('client_name.en')
                                            ->label('Name')
                                            ->required(),
                                        \Filament\Schemas\Components\TextInput::make('client_title.en')
                                            ->label('Job Title'),
                                        \Filament\Schemas\Components\Textarea::make('content.en')
                                            ->label('Testimonial Content')
                                            ->required(),
                                    ]),
                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('client_name.ar')
                                            ->label('الاسم')
                                            ->required(),
                                        \Filament\Schemas\Components\TextInput::make('client_title.ar')
                                            ->label('المسمى الوظيفي'),
                                        \Filament\Schemas\Components\Textarea::make('content.ar')
                                            ->label('نص الشهادة')
                                            ->required(),
                                    ]),
                            ]),
                        \Filament\Schemas\Components\TextInput::make('client_company'),
                        \Filament\Schemas\Components\FileUpload::make('avatar')
                            ->image()
                            ->avatar()
                            ->directory('testimonials'),
                        \Filament\Schemas\Components\Select::make('rating')
                            ->options([
                                5 => '5 Stars',
                                4 => '4 Stars',
                                3 => '3 Stars',
                                2 => '2 Stars',
                                1 => '1 Star',
                            ])
                            ->default(5)
                            ->required(),
                        \Filament\Schemas\Components\Toggle::make('is_active')
                            ->default(true),
                        \Filament\Schemas\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
