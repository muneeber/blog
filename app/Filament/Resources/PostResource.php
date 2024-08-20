<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Post Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->columnSpanFull()
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug',
                                \Illuminate\Support\Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug')
                            ->hidden(),

                        Forms\Components\TextInput::make('excerpt')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('thumbnail')
                            ->required(),
                        Forms\Components\TextInput::make('minutes_to_read')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'published' => 'Published',
                                'draft' => 'Draft',
                                'private' => 'Private',
                            ])
                            ->required(),
                        Forms\Components\Select::make('tags')
                            ->multiple()
                            ->preload()
                        ->relationship('tags', 'name')
                        ->required()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                        ])

                    ]),
                Forms\Components\Section::make('Post Body')
                    ->schema([
                        RichEditor::make('body')
                            ->label('Content')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\TextInput::make('author_id')
                    ->hidden()
                    ->default(Auth::user()->id)
                    ->required(),
            ]);
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('excerpt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('minutes_to_read')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('author.id')
                    ->numeric()
                    ->sortable(),
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
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TagsRelationManager::class,
            RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
