<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
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
}
