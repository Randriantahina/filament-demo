<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(1)->components([
            Section::make("Informations principales")
                ->columns(1)
                ->schema([
                    TextEntry::make("name")->label("Nom de la catégorie"),
                ]),

            Section::make("Dates importantes")
                ->columns(2)
                ->schema([
                    TextEntry::make("created_at")
                        ->label("Créée le")
                        ->dateTime(),
                    TextEntry::make("updated_at")
                        ->label("Dernière mise à jour")
                        ->dateTime(),
                ]),
        ]);
    }
}
