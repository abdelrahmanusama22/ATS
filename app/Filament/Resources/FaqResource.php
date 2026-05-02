<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
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

class FaqResource extends Resource
{
    use Translatable;

    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
<<<<<<< Updated upstream
    protected static ?string $navigationGroup = '🏢 Company';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')->required()->columnSpanFull(),
                Forms\Components\RichEditor::make('answer')->required()->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->default(true),
            ]);
=======
    protected static ?string $navigationGroup = '📄 Content & Legal';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('FAQ Details')->schema([
                Forms\Components\TextInput::make('question')->required()->maxLength(255)->columnSpanFull(),
                Forms\Components\Textarea::make('answer')->required()->rows(4)->columnSpanFull(),
                Forms\Components\TextInput::make('order')->numeric()->default(0),
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
                Tables\Columns\TextColumn::make('question')->searchable()->limit(50),
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
        return $table->reorderable('order')->defaultSort('order')->columns([
            Tables\Columns\TextColumn::make('question')->searchable(),
            Tables\Columns\TextColumn::make('order')->sortable(),
            Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
        ])->filters([Tables\Filters\TernaryFilter::make('is_active')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
>>>>>>> Stashed changes
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
