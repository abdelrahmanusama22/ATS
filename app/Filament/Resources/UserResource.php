<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = '👤 Users & Auditing';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('User Details')->schema([
                Forms\Components\TextInput::make('first_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('last_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true)->maxLength(255),
                Forms\Components\TextInput::make('phone')->tel()->maxLength(255),
                Forms\Components\TextInput::make('password')->password()->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))->required(fn (string $context): bool => $context === 'create'),
                Forms\Components\Select::make('roles')->relationship('roles', 'name')->multiple()->preload(),
                Forms\Components\Toggle::make('is_active')->label('Active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('first_name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('last_name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('roles.name')->badge(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
            Tables\Columns\TextColumn::make('last_login_at')->dateTime()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
