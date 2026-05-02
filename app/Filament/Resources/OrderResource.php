<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = '🛍 E-Commerce';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'order_number';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Order Information')
                            ->schema([
                                Forms\Components\TextInput::make('order_number')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->default(fn () => 'ORD-' . strtoupper(uniqid()))
                                    ->maxLength(255),

                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'email')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => '🟡 Pending',
                                        'processing' => '🔵 Processing',
                                        'shipped' => '🟣 Shipped',
                                        'delivered' => '🟢 Delivered',
                                        'cancelled' => '🔴 Cancelled',
                                    ])
                                    ->default('pending')
                                    ->required(),

                                Forms\Components\Select::make('address_id')
                                    ->relationship('address', 'address_line_1')
                                    ->searchable()
                                    ->preload()
                                    ->label('Shipping Address'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Financials')
                            ->schema([
                                Forms\Components\TextInput::make('subtotal')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01'),

                                Forms\Components\TextInput::make('shipping_fee')
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01')
                                    ->default(0),

                                Forms\Components\TextInput::make('tax')
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01')
                                    ->default(0),

                                Forms\Components\TextInput::make('total_amount')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01'),
                            ])
                            ->columns(4),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Order Date')
                                    ->content(fn (?Order $record): string => $record?->created_at?->format('M d, Y H:i') ?? '-'),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last Updated')
                                    ->content(fn (?Order $record): string => $record?->updated_at?->format('M d, Y H:i') ?? '-'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('user.email')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'shipped' => 'purple',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_amount')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Items'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
            RelationManagers\TrackingEventsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
