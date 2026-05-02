<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatureResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\FeatureResource\RelationManagers;
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Concerns\Translatable;
=======
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class FeatureResource extends Resource
{
    use Translatable;

    protected static ?string $model = Feature::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = '📄 Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('section')->required(),
                TextInput::make('title')->required(),
                Textarea::make('description')->required(),
                Textarea::make('icon_svg')->label('Icon SVG Code'),
                Toggle::make('is_active')->default(true),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Feature Details')->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->rows(3)->columnSpanFull(),
                Forms\Components\TextInput::make('icon_class')->maxLength(255)->helperText('CSS icon class (e.g. fa-solid fa-gear)'),
                Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            ])->columns(2),
        ]);
>>>>>>> Stashed changes
    }

    public static function table(Table $table): Table
    {
<<<<<<< Updated upstream
        return $table
            ->columns([
                TextColumn::make('section')->sortable()->searchable(),
                TextColumn::make('title')->searchable(),
                ToggleColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
=======
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('icon_class'),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
            Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }
}
