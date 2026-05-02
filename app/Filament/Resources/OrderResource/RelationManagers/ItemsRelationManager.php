<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Order Items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1),

                Forms\Components\TextInput::make('unit_price')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    ->step('0.01'),

                Forms\Components\KeyValue::make('attributes')
                    ->label('Selected Attributes')
                    ->keyLabel('Attribute')
                    ->valueLabel('Value')
                    ->helperText('e.g. Color: Red, Size: XL')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->money('USD'),
                Tables\Columns\TextColumn::make('line_total')
                    ->label('Total')
                    ->money('USD')
                    ->state(fn ($record) => $record->quantity * $record->unit_price),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
