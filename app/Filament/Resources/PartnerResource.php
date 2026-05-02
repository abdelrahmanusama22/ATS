<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
<<<<<<< Updated upstream
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;
    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $navigationGroup = '🏢 Company';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('url')->url(),
                Forms\Components\Toggle::make('is_active')->default(true),
                SpatieMediaLibraryFileUpload::make('logo')->collection('default')->columnSpanFull(),
            ]);
=======
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    use Translatable;

    protected static ?string $model = Partner::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Partner Details')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('website')->url()->maxLength(255),
                Forms\Components\SpatieMediaLibraryFileUpload::make('partner_logo')
                    ->collection('partner_logo')->image(),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')->collection('default'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('url')->searchable(),
                Tables\Columns\ToggleColumn::make('is_active'),
            ])
            ->filters([])
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
        return [];
=======
        return $table->columns([
            Tables\Columns\SpatieMediaLibraryImageColumn::make('partner_logo')->collection('partner_logo')->circular(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('website')->limit(30)->toggleable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
