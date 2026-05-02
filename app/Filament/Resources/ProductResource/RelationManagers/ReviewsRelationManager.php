<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    protected static ?string $title = 'Customer Reviews';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reviewer_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'email')
                    ->searchable()
                    ->preload()
                    ->label('Registered User'),

                Forms\Components\Select::make('rating')
                    ->options([
                        1 => '⭐ 1',
                        2 => '⭐⭐ 2',
                        3 => '⭐⭐⭐ 3',
                        4 => '⭐⭐⭐⭐ 4',
                        5 => '⭐⭐⭐⭐⭐ 5',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('comment')
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Approved')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reviewer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->limit(40),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
