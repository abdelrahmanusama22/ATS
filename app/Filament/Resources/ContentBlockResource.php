<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentBlockResource\Pages;
use App\Filament\Resources\ContentBlockResource\RelationManagers;
use App\Models\ContentBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ContentBlockResource extends Resource
{
    use Translatable;

    protected static ?string $model = ContentBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = '📄 Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')->required()->unique(ignoreRecord: true),
                TextInput::make('group')->required(),
                Select::make('type')->options([
                    'text' => 'Plain Text',
                    'rich_text' => 'Rich Text',
                    'image' => 'Image',
                ])->required()->reactive(),
                TextInput::make('content')->hidden(fn ($get) => $get('type') !== 'text'),
                RichEditor::make('content')->hidden(fn ($get) => $get('type') !== 'rich_text'),
                TextInput::make('link')->url()->nullable(),
                SpatieMediaLibraryFileUpload::make('image')->collection('default')->hidden(fn ($get) => $get('type') !== 'image'),
                Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')->searchable(),
                TextColumn::make('group')->sortable()->searchable(),
                TextColumn::make('type'),
                ToggleColumn::make('is_active'),
            ])
            ->filters([
                SelectFilter::make('group')->options(ContentBlock::query()->pluck('group', 'group')->toArray()),
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
            'index' => Pages\ListContentBlocks::route('/'),
            'create' => Pages\CreateContentBlock::route('/create'),
            'edit' => Pages\EditContentBlock::route('/{record}/edit'),
        ];
    }
}
