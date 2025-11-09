<x-filament-panels::page>
    <x-filament::tabs>
        <x-filament::tabs.item
            :active="$this->activeTab === 'details'"
            wire:click="$set('activeTab', 'details')"
        >
            Details
        </x-filament::tabs.item>

        <x-filament::tabs.item
            :active="$this->activeTab === 'posts'"
            wire:click="$set('activeTab', 'posts')"
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
