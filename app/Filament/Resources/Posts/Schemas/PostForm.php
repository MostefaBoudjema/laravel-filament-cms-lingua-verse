<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(3)
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(1)
                            ->schema([
                                \Filament\Schemas\Components\Section::make('Content')
                                    ->schema([
                                        \Filament\Schemas\Components\Tabs::make('Translations')
                                            ->tabs([
                                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                                    ->schema([
                                                        \Filament\Schemas\Components\TextInput::make('title.en')
                                                            ->required()
                                                            ->live(onBlur: true)
                                                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                                        \Filament\Schemas\Components\Textarea::make('excerpt.en'),
                                                        \Filament\Schemas\Components\RichEditor::make('body.en')
                                                            ->required(),
                                                    ]),
                                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                                    ->schema([
                                                        \Filament\Schemas\Components\TextInput::make('title.ar')
                                                            ->required(),
                                                        \Filament\Schemas\Components\Textarea::make('excerpt.ar'),
                                                        \Filament\Schemas\Components\RichEditor::make('body.ar')
                                                            ->required(),
                                                    ]),
                                            ]),
                                    ]),
                                \Filament\Schemas\Components\Section::make('SEO')
                                    ->schema([
                                        \Filament\Schemas\Components\Tabs::make('SEO Translations')
                                            ->tabs([
                                                \Filament\Schemas\Components\Tabs\Tab::make('English')
                                                    ->schema([
                                                        \Filament\Schemas\Components\TextInput::make('meta_title.en'),
                                                        \Filament\Schemas\Components\Textarea::make('meta_description.en'),
                                                    ]),
                                                \Filament\Schemas\Components\Tabs\Tab::make('Arabic')
                                                    ->schema([
                                                        \Filament\Schemas\Components\TextInput::make('meta_title.ar'),
                                                        \Filament\Schemas\Components\Textarea::make('meta_description.ar'),
                                                    ]),
                                            ]),
                                    ]),
                            ])
                            ->columnSpan(2),
                        \Filament\Schemas\Components\Grid::make(1)
                            ->schema([
                                \Filament\Schemas\Components\Section::make('Settings')
                                    ->schema([
                                        \Filament\Schemas\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                        \Filament\Schemas\Components\Select::make('category_id')
                                            ->relationship('category', 'name->en')
                                            ->searchable()
                                            ->preload(),
                                        \Filament\Schemas\Components\Select::make('tags')
                                            ->relationship('tags', 'name->en')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),
                                        \Filament\Schemas\Components\Select::make('author_id')
                                            ->relationship('author', 'name')
                                            ->default(auth()->id())
                                            ->required(),
                                        \Filament\Schemas\Components\FileUpload::make('featured_image')
                                            ->image()
                                            ->directory('blog'),
                                        \Filament\Schemas\Components\Toggle::make('is_published')
                                            ->label('Published'),
                                        \Filament\Schemas\Components\DateTimePicker::make('published_at'),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
