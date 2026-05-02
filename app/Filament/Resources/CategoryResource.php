<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
>>>>>>> Stashed changes

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = Category::class;

<<<<<<< Updated upstream
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛍 Catalog & Services';
=======
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = '🛍 E-Commerce';

    protected static ?int $navigationSort = 0;
>>>>>>> Stashed changes

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< Updated upstream
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('slug')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
=======
                Forms\Components\Section::make('Category Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('category_image')
                            ->collection('category_image')
                            ->image()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
>>>>>>> Stashed changes
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
<<<<<<< Updated upstream
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
=======
                Tables\Columns\SpatieMediaLibraryImageColumn::make('category_image')
                    ->collection('category_image')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Products'),

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
<<<<<<< Updated upstream
=======
                    ExportBulkAction::make(),
>>>>>>> Stashed changes
                ]),
            ]);
    }

    public static function getRelations(): array
    {
<<<<<<< Updated upstream
        return [
            //
        ];
=======
        return [];
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
