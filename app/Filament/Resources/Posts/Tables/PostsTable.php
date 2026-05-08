<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('featured_image'),
                \Filament\Tables\Columns\TextColumn::make('title')->searchable()->limit(50),
                \Filament\Tables\Columns\TextColumn::make('category.name')->label('Category'),
                \Filament\Tables\Columns\TextColumn::make('author.name')->label('Author'),
                \Filament\Tables\Columns\ToggleColumn::make('is_published'),
                \Filament\Tables\Columns\TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
