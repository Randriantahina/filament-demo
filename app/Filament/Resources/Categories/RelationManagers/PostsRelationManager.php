<?php

namespace App\Filament\Resources\Categories\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Components\Section;
use Filament\Tables\Table;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = "posts";

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            Section::make("Détails de l’article")
                ->description(
                    "Renseignez les informations principales de l’article.",
                )
                ->schema([
                    TextInput::make("title")
                        ->label("Titre")
                        ->required()
                        ->maxLength(255)
                        ->placeholder("Entrez le titre de l’article"),

                    TextInput::make("slug")
                        ->label("Slug")
                        ->required()
                        ->maxLength(255)
                        ->placeholder("ex: mon-article-exemple"),
                ]),

            Section::make("Contenu")
                ->description("Rédigez le contenu principal de l’article.")
                ->schema([
                    Textarea::make("content")
                        ->label("Contenu")
                        ->required()
                        ->rows(8)
                        ->columnSpanFull()
                        ->placeholder(
                            "Écrivez le contenu de votre article ici...",
                        ),
                ]),
            Section::make("Catégorie")
                ->description("Sélectionnez la catégorie de cet article.")
                ->schema([
                    Select::make("category_id")
                        ->label("Catégorie")
                        ->relationship("category", "name")
                        ->required()
                        ->searchable()
                        ->preload(),
                ]),

            Section::make("Auteur")
                ->description("Sélectionnez l’auteur de cet article.")
                ->schema([
                    Select::make("user_id")
                        ->label("Auteur")
                        ->relationship("user", "name")
                        ->required()
                        ->searchable()
                        ->preload(),
                ]),
        ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema->columns(1)->components([
            Section::make("Informations principales")
                ->columns(3)
                ->schema([
                    TextEntry::make("title")->label("Titre"),

                    TextEntry::make("slug")->label("Slug"),

                    TextEntry::make("user.name")->label("Auteur"),
                ]),

            Section::make("Contenu")->schema([
                TextEntry::make("content")
                    ->label("Contenu")
                    ->columnSpanFull()
                    ->placeholder("Aucun contenu disponible"),
            ]),

            Section::make("Métadonnées")
                ->columns(2)
                ->schema([
                    TextEntry::make("created_at")
                        ->label("Créé le")
                        ->dateTime()
                        ->placeholder("-"),

                    TextEntry::make("updated_at")
                        ->label("Mis à jour le")
                        ->dateTime()
                        ->placeholder("-"),
                ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute("title")
            ->columns([
                TextColumn::make("title")->searchable(),
                TextColumn::make("slug")->searchable(),
                TextColumn::make("user.name")->searchable(),
                TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("updated_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([CreateAction::make()])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
