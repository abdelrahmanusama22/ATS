<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
<<<<<<< Updated upstream
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;
=======
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class CareerResource extends Resource
{
    use Translatable;

    protected static ?string $model = Career::class;
<<<<<<< Updated upstream
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = '🏢 Company';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('type'),
                Forms\Components\TextInput::make('salary'),
                Forms\Components\TextInput::make('location'),
                Forms\Components\DatePicker::make('closing_date'),
                Forms\Components\Toggle::make('is_active')->default(true),
                Forms\Components\RichEditor::make('description')->columnSpanFull(),
                Forms\Components\RichEditor::make('requirements')->columnSpanFull(),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Job Details')->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\TextInput::make('location')->required()->maxLength(255),
                Forms\Components\Select::make('type')->options([
                    'full_time' => 'Full Time',
                    'part_time' => 'Part Time',
                    'contract' => 'Contract',
                    'internship' => 'Internship',
                ])->required(),
                Forms\Components\RichEditor::make('description')->required()->columnSpanFull(),
                Forms\Components\RichEditor::make('requirements')->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Active (Open)')->default(true),
            ])->columns(2),
        ]);
>>>>>>> Stashed changes
    }

    public static function table(Table $table): Table
    {
<<<<<<< Updated upstream
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('type')->searchable(),
                Tables\Columns\TextColumn::make('location')->searchable(),
                Tables\Columns\TextColumn::make('closing_date')->date()->sortable(),
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
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('location')->searchable(),
            Tables\Columns\TextColumn::make('type')->badge(),
            Tables\Columns\IconColumn::make('is_active')->label('Open')->boolean()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')->label('Open Status')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
