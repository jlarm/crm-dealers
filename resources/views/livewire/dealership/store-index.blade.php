<div class="grid grid-cols-12 gap-5">
    <div class="col-span-2">
        <livewire:dealership.components.navigation :$dealership />
    </div>
    <div class="col-span-7">
        <flux:card>
            <flux:table :paginate="$this->stores">
                <flux:table.columns>
                    <flux:table.column
                        sortable
                        :sorted="$sortBy === 'date'"
                        :direction="$sortDirection"
                        wire:click="sort('date')"
                    >
                        Name
                    </flux:table.column>
                    <flux:table.column
                        sortable
                        :sorted="$sortBy === 'status'"
                        :direction="$sortDirection"
                        wire:click="sort('status')"
                    >
                        Phone
                    </flux:table.column>
                    <flux:table.column
                        sortable
                        :sorted="$sortBy === 'amount'"
                        :direction="$sortDirection"
                        wire:click="sort('amount')"
                    ></flux:table.column>
                </flux:table.columns>
                <flux:table.rows>
                    @foreach ($this->stores as $store)
                        <flux:table.row :key="$store->id">
                            <flux:table.cell>
                                {{ $store->name }}
                                <span class="block text-xs">{{ $store->city }}, {{ $store->state }}</span>
                            </flux:table.cell>
                            <flux:table.cell class="whitespace-nowrap">{{ $store->phone }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:button
                                    variant="ghost"
                                    size="sm"
                                    icon="ellipsis-horizontal"
                                    inset="top bottom"
                                ></flux:button>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        </flux:card>
    </div>
    <div class="col-span-3">
        <flux:card></flux:card>
    </div>
</div>
