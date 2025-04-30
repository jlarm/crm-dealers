<flux:table.row :key="$store->id">
    <flux:table.cell>
        {{ $store->name }}
        <span class="block text-xs">{{ $store->city }}, {{ $store->state }}</span>
    </flux:table.cell>
    <flux:table.cell class="whitespace-nowrap">{{ $store->phone }}</flux:table.cell>
    <flux:table.cell align="end">
        <flux:modal.trigger :name="'edit-store-' . $store->id">
            <flux:button class="ml-auto" size="xs">Edit</flux:button>
        </flux:modal.trigger>

        <flux:modal :name="'edit-store-' . $store->id" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Update store</flux:heading>
                </div>

                <form wire:submit.prevent="updateStore" class="space-y-4">
                    <flux:input wire:model="name" label="Dealership Name" placeholder="Store name" />

                    <flux:input wire:model="address" label="Address" placeholder="Store address" />

                    <flux:input wire:model="city" label="City" placeholder="Store city" />

                    <flux:input wire:model="state" label="State" placeholder="Store state" />

                    <flux:input wire:model="zip_code" label="Zip Code" placeholder="Store zip code" />

                    <flux:input wire:model="phone" label="Phone" placeholder="Store phone" />

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>
    </flux:table.cell>
</flux:table.row>
