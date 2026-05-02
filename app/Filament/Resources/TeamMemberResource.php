<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
<<<<<<< Updated upstream
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
=======
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class TeamMemberResource extends Resource
{
    use Translatable;

    protected static ?string $model = TeamMember::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
<<<<<<< Updated upstream
    protected static ?string $navigationGroup = '🏢 Company';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('role')->required(),
                Forms\Components\Toggle::make('is_active')->default(true),
                SpatieMediaLibraryFileUpload::make('image')->collection('default')->columnSpanFull(),
                Forms\Components\Textarea::make('bio')->columnSpanFull(),
            ]);
=======
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Team Member Details')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('position')->required()->maxLength(255),
                Forms\Components\SpatieMediaLibraryFileUpload::make('profile_image')
                    ->collection('profile_image')->image(),
                Forms\Components\Textarea::make('bio')->rows(3)->columnSpanFull(),
                Forms\Components\KeyValue::make('social_links')->columnSpanFull()
                    ->helperText('e.g. LinkedIn: https://linkedin.com/in/...'),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->collection('default'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('role')->searchable(),
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
            Tables\Columns\SpatieMediaLibraryImageColumn::make('profile_image')->collection('profile_image')->circular(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('position')->searchable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
