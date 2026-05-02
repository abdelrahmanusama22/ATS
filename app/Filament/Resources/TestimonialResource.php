<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
<<<<<<< Updated upstream
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
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
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
=======
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
>>>>>>> Stashed changes

class TestimonialResource extends Resource
{
    use Translatable;

    protected static ?string $model = Testimonial::class;
<<<<<<< Updated upstream

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = '📄 Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('client_name')->required(),
                TextInput::make('company_role')->required(),
                Textarea::make('content')->required(),
                Select::make('rating')->options([1=>1, 2=>2, 3=>3, 4=>4, 5=>5])->default(5)->required(),
                SpatieMediaLibraryFileUpload::make('avatar')->collection('default'),
                Toggle::make('is_active')->default(true),
            ]);
=======
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = '🏢 Corporate';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Testimonial Details')->schema([
                Forms\Components\TextInput::make('client_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('client_position')->maxLength(255),
                Forms\Components\SpatieMediaLibraryFileUpload::make('client_image')
                    ->collection('client_image')->image(),
                Forms\Components\Textarea::make('content')->required()->rows(4)->columnSpanFull(),
                Forms\Components\Select::make('rating')->options([
                    1 => '⭐ 1', 2 => '⭐⭐ 2', 3 => '⭐⭐⭐ 3', 4 => '⭐⭐⭐⭐ 4', 5 => '⭐⭐⭐⭐⭐ 5',
                ])->default(5)->required(),
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
                SpatieMediaLibraryImageColumn::make('avatar')->collection('default'),
                TextColumn::make('client_name')->searchable(),
                TextColumn::make('company_role'),
                TextColumn::make('rating')->sortable(),
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
        return $table->columns([
            Tables\Columns\SpatieMediaLibraryImageColumn::make('client_image')->collection('client_image')->circular(),
            Tables\Columns\TextColumn::make('client_name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('client_position'),
            Tables\Columns\TextColumn::make('rating')->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
