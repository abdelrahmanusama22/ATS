<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\ContactMessageResource\RelationManagers;
=======
>>>>>>> Stashed changes
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
<<<<<<< Updated upstream
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
=======
use Filament\Tables\Table;
>>>>>>> Stashed changes

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '📈 Logs & Support';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel(),
                Forms\Components\TextInput::make('subject'),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Message Details')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                Forms\Components\TextInput::make('phone')->maxLength(255),
                Forms\Components\TextInput::make('subject')->required()->maxLength(255)->columnSpanFull(),
                Forms\Components\Textarea::make('message')->required()->rows(5)->columnSpanFull(),
                Forms\Components\Toggle::make('is_read')->label('Mark as Read')->default(false),
            ])->columns(3),
        ]);
>>>>>>> Stashed changes
    }

    public static function table(Table $table): Table
    {
<<<<<<< Updated upstream
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('subject')->limit(30)->searchable(),
            Tables\Columns\IconColumn::make('is_read')->label('Read')->boolean()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])->defaultSort('created_at', 'desc')->filters([Tables\Filters\TernaryFilter::make('is_read')])
        ->actions([Tables\Actions\ViewAction::make(), Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'create' => Pages\CreateContactMessage::route('/create'),
<<<<<<< Updated upstream
=======
            'view' => Pages\ViewContactMessage::route('/{record}'),
>>>>>>> Stashed changes
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
