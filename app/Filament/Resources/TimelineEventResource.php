<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimelineEventResource\Pages;
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

class TimelineEventResource extends Resource
{
    use Translatable;

    protected static ?string $model = TimelineEvent::class;

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
    }

    public static function table(Table $table): Table
    {
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
