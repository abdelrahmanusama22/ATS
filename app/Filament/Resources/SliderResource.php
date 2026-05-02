<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class SliderResource extends Resource
{
    use Translatable;

    protected static ?string $model = Slider::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('subtitle')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image_path')
                    ->image(),
                Forms\Components\Textarea::make('button_text')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('link'),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = '📄 Content & Legal';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Slider Details')->schema([
                Forms\Components\TextInput::make('title')->maxLength(255),
                Forms\Components\Textarea::make('subtitle')->rows(3)->columnSpanFull(),
                Forms\Components\TextInput::make('button_text')->maxLength(255),
                Forms\Components\TextInput::make('link')->maxLength(255),
                Forms\Components\SpatieMediaLibraryFileUpload::make('slider_image')
                    ->collection('slider_image')->image()->required()->columnSpanFull(),
                Forms\Components\TextInput::make('order')->numeric()->default(0),
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
                Tables\Columns\ImageColumn::make('image_path'),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
        return $table->reorderable('order')->defaultSort('order')->columns([
            Tables\Columns\SpatieMediaLibraryImageColumn::make('slider_image')->collection('slider_image'),
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('order')->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
