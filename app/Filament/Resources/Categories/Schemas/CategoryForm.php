<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(1)->components([
            Section::make("Détails de la catégorie")
                ->description("Renseignez les informations de la catégorie.")
                ->schema([
                    TextInput::make("name")
                        ->label("Nom")
                        ->required()
                        ->maxLength(255),
                ]),
        ]);
    }
}
