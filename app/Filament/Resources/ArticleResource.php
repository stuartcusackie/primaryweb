<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Articles';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title'),

                Forms\Components\Section::make('Article content')
                    ->description('Build your article using various text and image blocks.')
                    ->schema([
                        Forms\Components\Builder::make('content')
                            ->label(false)
                            ->addActionLabel('Add to content')
                            ->blockPreviews()
                            ->blocks([
                                Forms\Components\Builder\Block::make('text')
                                    ->schema([
                                        Forms\Components\RichEditor::make('text')
                                            ->disableToolbarButtons([
                                                'strike',
                                                'attachFiles',
                                                'codeBlock'
                                            ])
                                    ])
                                    ->preview('filament.content.block-previews.articles.text'),
                                Forms\Components\Builder\Block::make('image')
                                    ->schema([
                                        Forms\Components\FileUpload::make('url')
                                            ->label('Image')
                                            ->image()
                                            ->required(),
                                        Forms\Components\TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                    ])
                                    ->preview('filament.content.block-previews.articles.image')
                                    ->columns(['md' => 2]),
                            ])
                        ->collapsible()
                        ->blockNumbers(false)
                        ->deleteAction(
                            fn (Action $action) => $action->requiresConfirmation(),
                        )
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('title')
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
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
