<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\MenuResource\RelationManagers;
=======
use App\Filament\Resources\MenuResource\RelationManagers\ItemsRelationManager;
>>>>>>> Stashed changes
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
>>>>>>> Stashed changes

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

<<<<<<< Updated upstream
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

=======
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

    protected static ?int $navigationSort = 3;

>>>>>>> Stashed changes
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< Updated upstream
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('location'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
=======
                Forms\Components\Section::make('Menu Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('location')
                            ->options([
                                'header_main' => 'Header Main',
                                'footer_products' => 'Footer Products',
                                'footer_company' => 'Footer Company',
                                'footer_support' => 'Footer Support',
                                'mobile_bottom_nav' => 'Mobile Bottom Nav',
                            ])
                            ->required(),

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
                Tables\Columns\TextColumn::make('name')
<<<<<<< Updated upstream
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
=======
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Items'),

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
                Tables\Filters\SelectFilter::make('location')
                    ->options([
                        'header_main' => 'Header Main',
                        'footer_products' => 'Footer Products',
                        'footer_company' => 'Footer Company',
                        'footer_support' => 'Footer Support',
                        'mobile_bottom_nav' => 'Mobile Bottom Nav',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
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
        return [
<<<<<<< Updated upstream
            //
=======
            ItemsRelationManager::class,
>>>>>>> Stashed changes
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
