<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;

class VariantsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'variants';

    protected static ?string $title = 'Product Variants';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('attribute_name')
                    ->required()
                    ->maxLength(255)
                    ->helperText('e.g. Color, Size'),

                Forms\Components\TextInput::make('attribute_value')
                    ->required()
                    ->maxLength(255)
                    ->helperText('e.g. Red, XL'),

                Forms\Components\TextInput::make('price_adjustment')
                    ->numeric()
                    ->prefix('$')
                    ->step('0.01')
                    ->default(0),

                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->default(0),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('attribute_name'),
                Tables\Columns\TextColumn::make('attribute_value'),
                Tables\Columns\TextColumn::make('price_adjustment')
                    ->money('USD'),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric(),
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
