<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
>>>>>>> Stashed changes

class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛍 Catalog & Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('icon_class'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Service Details')->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\RichEditor::make('description')->columnSpanFull(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('service_image')
                    ->collection('service_image')->image()->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            ])->columns(2),
            Forms\Components\Section::make('SEO')->schema([
                Forms\Components\TextInput::make('seo_title')->label('Meta Title')->maxLength(70),
                Forms\Components\Textarea::make('seo_description')->label('Meta Description')->maxLength(160)->rows(3),
            ])->columns(2)->collapsible()->collapsed(),
        ]);
>>>>>>> Stashed changes
    }

    public static function table(Table $table): Table
    {
<<<<<<< Updated upstream
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon_class')
                    ->searchable(),
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
                    ExportBulkAction::make(),
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
            Tables\Columns\SpatieMediaLibraryImageColumn::make('service_image')->collection('service_image')->circular(),
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
            Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(), ExportBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
