<flux:navlist>
    <flux:navlist.item
        wire:navigate
        href="{{ route('dealership.show', $dealership) }}"
        icon="home"
        :current="request()->routeIs('dealership.show', $dealership)"
    >
        General
    </flux:navlist.item>
    <flux:navlist.item
        wire:navigate
        {{-- href="{{ route('dealership.stores', $dealership) }}" --}}
        icon="puzzle-piece"
        {{-- :current="request()->routeIs('dealership.stores', $dealership)" --}}
    >
        Stores
    </flux:navlist.item>
    <flux:navlist.item
        wire:navigate
        {{-- href="{{ route('dealership.contacts', $dealership) }}" --}}
        icon="user"
        {{-- :current="request()->routeIs('dealership.contacts', $dealership)" --}}
    >
        Contacts
    </flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="chart-bar">Progress</flux:navlist.item>
    <flux:navlist.item wire:navigate href="#" icon="envelope">Emails</flux:navlist.item>
</flux:navlist>
