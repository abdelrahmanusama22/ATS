<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
<<<<<<< Updated upstream
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
>>>>>>> Stashed changes

class ProductResource extends Resource
{
    use Translatable;

    protected static ?string $model = Product::class;

<<<<<<< Updated upstream
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛍 Catalog & Services';
=======
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = '🛍 E-Commerce';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> Stashed changes

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< Updated upstream
                SpatieMediaLibraryFileUpload::make('image')->collection('default'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                Forms\Components\TextInput::make('views_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('orders_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
=======
                Forms\Components\Group::make()
                    ->schema([
                        // ── Main Info ──
                        Forms\Components\Section::make('Product Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\TextInput::make('brand')
                                    ->maxLength(255),

                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        // ── Pricing & Stock ──
                        Forms\Components\Section::make('Pricing & Inventory')
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01'),

                                Forms\Components\TextInput::make('sale_price')
                                    ->numeric()
                                    ->prefix('$')
                                    ->step('0.01')
                                    ->lt('price'),

                                Forms\Components\TextInput::make('stock')
                                    ->required()
                                    ->numeric()
                                    ->default(0),

                                Forms\Components\TextInput::make('stock_status')
                                    ->maxLength(255)
                                    ->helperText('e.g. In Stock, Out of Stock, Pre-order'),
                            ])
                            ->columns(2),

                        // ── Features & Specs ──
                        Forms\Components\Section::make('Features & Specifications')
                            ->schema([
                                Forms\Components\Repeater::make('features_list')
                                    ->label('Features')
                                    ->simple(
                                        Forms\Components\TextInput::make('feature')
                                            ->required(),
                                    )
                                    ->defaultItems(0)
                                    ->columnSpanFull(),

                                Forms\Components\KeyValue::make('specifications')
                                    ->label('Specifications')
                                    ->keyLabel('Attribute')
                                    ->valueLabel('Value')
                                    ->columnSpanFull(),
                            ])
                            ->collapsible(),

                        // ── SEO ──
                        Forms\Components\Section::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('Meta Title')
                                    ->maxLength(70),

                                Forms\Components\Textarea::make('seo_description')
                                    ->label('Meta Description')
                                    ->maxLength(160)
                                    ->rows(3),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed(),
                    ])
                    ->columnSpan(['lg' => 2]),

                // ── Sidebar ──
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                Forms\Components\Placeholder::make('views_count')
                                    ->label('Total Views')
                                    ->content(fn (?Product $record): string => $record?->views_count ?? '0'),
                            ]),

                        Forms\Components\Section::make('Media')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                                    ->collection('thumbnail')
                                    ->image()
                                    ->label('Product Thumbnail'),

                                Forms\Components\SpatieMediaLibraryFileUpload::make('gallery')
                                    ->collection('gallery')
                                    ->multiple()
                                    ->reorderable()
                                    ->image()
                                    ->label('Product Gallery')
                                    ->helperText('Upload multiple images for the product gallery'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
>>>>>>> Stashed changes
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
<<<<<<< Updated upstream
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('orders_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
=======
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('brand')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('views_count')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

>>>>>>> Stashed changes
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
<<<<<<< Updated upstream
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
=======
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            //
=======
            RelationManagers\VariantsRelationManager::class,
            RelationManagers\ReviewsRelationManager::class,
>>>>>>> Stashed changes
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
