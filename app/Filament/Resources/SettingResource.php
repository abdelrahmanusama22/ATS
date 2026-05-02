<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\SettingResource\RelationManagers;
=======
>>>>>>> Stashed changes
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
<<<<<<< Updated upstream
use Filament\Resources\Concerns\Translatable;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    use Translatable;

    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

=======
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

    protected static ?int $navigationSort = 1;

>>>>>>> Stashed changes
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< Updated upstream
                Forms\Components\TextInput::make('key')
                    ->required(),
                Forms\Components\Textarea::make('value')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
=======
                Forms\Components\Section::make('Setting Details')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Unique identifier for this setting (e.g., site_name, footer_text)')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'image' => 'Image',
                                'json_array' => 'JSON Array',
                            ])
                            ->default('text')
                            ->required()
                            ->reactive(),

                        Forms\Components\Textarea::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'text')
                            ->columnSpanFull(),

                        Forms\Components\KeyValue::make('value')
                            ->visible(fn (Forms\Get $get) => $get('type') === 'json_array')
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
                Tables\Columns\TextColumn::make('key')
<<<<<<< Updated upstream
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
=======
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'text' => 'info',
                        'image' => 'success',
                        'json_array' => 'warning',
                        default => 'gray',
                    }),

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
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                        'json_array' => 'JSON Array',
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
