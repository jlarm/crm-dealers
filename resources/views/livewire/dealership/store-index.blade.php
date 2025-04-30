<div class="grid grid-cols-12 gap-5">
    <div class="col-span-2">
        <livewire:dealership.components.navigation :$dealership />
    </div>
    <div class="col-span-10">
        <flux:heading size="xl" class="mb-2">{{ $dealership->name }}</flux:heading>
        <div class="grid grid-cols-10 gap-5">
            <div class="col-span-7">
                <flux:card>
                    <flux:table :paginate="$this->stores">
                        <flux:table.columns>
                            <flux:table.column
                                sortable
                                :sorted="$sortBy === 'name'"
                                :direction="$sortDirection"
                                wire:click="sort('name')"
                            >
                                Name
                            </flux:table.column>
                            <flux:table.column>Phone</flux:table.column>
                            <flux:table.column></flux:table.column>
                        </flux:table.columns>
                        <flux:table.rows>
                            @foreach ($this->stores as $store)
                                <livewire:dealership.store-index-item :$store :key="$store->id" />
                            @endforeach
                        </flux:table.rows>
                    </flux:table>
                </flux:card>
            </div>
            <div class="col-span-3">
                <flux:card></flux:card>
            </div>
        </div>
    </div>
</div>
