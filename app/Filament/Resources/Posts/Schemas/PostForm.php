<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
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
}
