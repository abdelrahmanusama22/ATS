<?php

namespace App\Filament\Resources;

use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\ActivityLogResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivityLogResource extends Resource
{
    protected static ?string $model = Activity::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = '👤 Users & Auditing';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Activity Logs';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Log Details')->schema([
                Forms\Components\TextInput::make('log_name')->disabled(),
                Forms\Components\TextInput::make('event')->disabled(),
                Forms\Components\TextInput::make('subject_type')->disabled(),
                Forms\Components\TextInput::make('subject_id')->disabled(),
                Forms\Components\TextInput::make('causer_type')->disabled(),
                Forms\Components\TextInput::make('causer_id')->disabled(),
            ])->columns(3),

            Forms\Components\Section::make('Changes (Old vs New)')->schema([
                Forms\Components\KeyValue::make('properties.old')
                    ->label('Old Values')
                    ->disabled()
                    ->columnSpan(1),
                Forms\Components\KeyValue::make('properties.attributes')
                    ->label('New Values')
                    ->disabled()
                    ->columnSpan(1),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('log_name')->badge()->sortable(),
            Tables\Columns\TextColumn::make('event')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'created' => 'success',
                    'updated' => 'warning',
                    'deleted' => 'danger',
                    default => 'gray',
                }),
            Tables\Columns\TextColumn::make('description')->searchable(),
            Tables\Columns\TextColumn::make('subject_type')->label('Model')->formatStateUsing(fn ($state) => class_basename($state)),
            Tables\Columns\TextColumn::make('causer.email')->label('Causer')->searchable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])->defaultSort('created_at', 'desc')->filters([
            Tables\Filters\SelectFilter::make('event')->options([
                'created' => 'Created', 'updated' => 'Updated', 'deleted' => 'Deleted'
            ])
        ])->actions([Tables\Actions\ViewAction::make()])
        ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
            'view' => Pages\ViewActivityLog::route('/{record}'),
        ];
    }
}
