<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentBlockResource\Pages;
<<<<<<< Updated upstream
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
=======
use App\Models\ContentBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
>>>>>>> Stashed changes

class ContentBlockResource extends Resource
{
    use Translatable;

    protected static ?string $model = ContentBlock::class;

<<<<<<< Updated upstream
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = '📄 Content';
=======
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $navigationGroup = '🛠 Site Infrastructure';

    protected static ?int $navigationSort = 2;
>>>>>>> Stashed changes

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
<<<<<<< Updated upstream
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
=======
                Forms\Components\Section::make('Content Block Details')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Unique key to reference this block (e.g., hero_title, about_text)')
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                            ->collection('images')
                            ->multiple()
                            ->image()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
>>>>>>> Stashed changes
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
<<<<<<< Updated upstream
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
=======
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->html(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
>>>>>>> Stashed changes
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
<<<<<<< Updated upstream
=======
                    ExportBulkAction::make(),
>>>>>>> Stashed changes
                ]),
            ]);
    }

    public static function getRelations(): array
    {
<<<<<<< Updated upstream
        return [
            //
        ];
=======
        return [];
>>>>>>> Stashed changes
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
