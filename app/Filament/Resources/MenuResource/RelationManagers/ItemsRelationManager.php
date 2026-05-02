<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('url')
                    ->url()
                    ->maxLength(255)
                    ->helperText('External URL. Leave empty if linking to an internal page.'),

                Forms\Components\Select::make('page_id')
                    ->relationship('page', 'slug')
                    ->searchable()
                    ->preload()
                    ->helperText('Internal page link. Leave empty if using an external URL.'),

                Forms\Components\Textarea::make('icon_svg')
                    ->label('Icon SVG')
                    ->helperText('Paste raw SVG code for the menu icon')
                    ->rows(3),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),

                Forms\Components\Select::make('target')
                    ->options([
                        '_self' => 'Same Window',
                        '_blank' => 'New Tab',
                    ])
                    ->default('_self'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('url')
                    ->limit(30)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('page.slug')
                    ->label('Page')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\LocaleSwitcher::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
