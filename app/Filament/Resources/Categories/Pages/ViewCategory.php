<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCategory extends ViewRecord
{
    protected static string $resource = CategoryResource::class;

    protected string $view = "filament.resources.categories.pages.view-category";

    public ?string $activeTab = "details";

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->hidden(
                fn(ViewCategory $livewire) => $livewire->activeTab !==
                    "details",
            ),
        ];
    }

    // public function getRelations(): array
    // {
    //     return [];
    // }
}
