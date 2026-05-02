<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineEventResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\TimelineEventResource\RelationManagers;
use App\Models\TimelineEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Concerns\Translatable;
=======
use App\Models\TimelineEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class TimelineEventResource extends Resource
{
    use Translatable;

    protected static ?string $model = TimelineEvent::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = '📄 Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('year')->required(),
                TextInput::make('title')->required(),
                Textarea::make('description')->required(),
                Toggle::make('is_active')->default(true),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = '📄 Content & Legal';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Event Details')->schema([
                Forms\Components\TextInput::make('year')->required()->numeric(),
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->required()->rows(3)->columnSpanFull(),
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
                TextColumn::make('year')->sortable()->searchable(),
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
        return $table->defaultSort('year', 'asc')->columns([
            Tables\Columns\TextColumn::make('year')->sortable(),
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTimelineEvents::route('/'),
            'create' => Pages\CreateTimelineEvent::route('/create'),
            'edit' => Pages\EditTimelineEvent::route('/{record}/edit'),
        ];
    }
}
