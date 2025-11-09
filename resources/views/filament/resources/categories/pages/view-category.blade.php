<x-filament-panels::page>
    <x-filament::tabs>
        <x-filament::tabs.item
            :active="$this->activeTab === 'details'"
            wire:click="$set('activeTab', 'details')"
            icon="heroicon-o-document"
        >
            Details
        </x-filament::tabs.item>

        <x-filament::tabs.item
            :active="$this->activeTab === 'posts'"
            wire:click="$set('activeTab', 'posts')"
            icon="heroicon-o-newspaper"
        >
            Posts
        </x-filament::tabs.item>
    </x-filament::tabs>

    @if ($this->activeTab === 'details')
        {{ $this->infolist }}
    @endif

    @if ($this->activeTab === 'posts')
        @livewire(\App\Filament\Resources\Categories\RelationManagers\PostsRelationManager::class, ['ownerRecord' => $record, 'pageClass' => static::class])
    @endif

</x-filament-panels::page>
