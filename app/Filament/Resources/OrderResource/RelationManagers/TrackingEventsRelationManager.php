<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;

class TrackingEventsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'trackingEvents';

    protected static ?string $title = 'Tracking History';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'order_placed' => 'Order Placed',
                        'payment_confirmed' => 'Payment Confirmed',
                        'processing' => 'Processing',
                        'packed' => 'Packed',
                        'shipped' => 'Shipped',
                        'in_transit' => 'In Transit',
                        'out_for_delivery' => 'Out for Delivery',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                        'returned' => 'Returned',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('location')
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->rows(2)
                    ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('event_date')
                    ->required()
                    ->default(now()),

                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('event_date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'delivered' => 'success',
                        'cancelled', 'returned' => 'danger',
                        'shipped', 'in_transit', 'out_for_delivery' => 'info',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(40),
                Tables\Columns\TextColumn::make('event_date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\LocaleSwitcher::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
