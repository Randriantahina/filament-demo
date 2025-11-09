<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Tabs\Tab;

class ViewCategory extends ViewRecord
{
    protected static string $resource = CategoryResource::class;

    public ?string $activeTab = "details";

    // protected string $view = "filament.resources.categories.pages.view-category";

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    public function getContentTabIcon(): ?string
    {
        return "heroicon-o-document";
    }

    public function getContentTabLabel(): ?string
    {
        return $this->activeTab;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            // ->hidden(
            //     fn(ViewCategory $livewire) => $livewire->activeTab !==
            //         "details",
            // ),
            DeleteAction::make(),
            // ->hidden(
            //     fn(ViewCategory $livewire) => $livewire->activeTab !==
            //         "details",
            // ),
        ];
    }

    // public function getRelations(): array
    // {
    //     return [];
    // }
}
