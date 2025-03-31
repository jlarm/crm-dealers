<div>
    <form wire:submit.prevent="updateDealership">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-2">
                <livewire:dealership.components.navigation :$dealership />
            </div>
            <div class="col-span-7">
                <flux:card>
                    <div class="space-y-5">
                        <flux:input wire:model="name" label="Name" badge="required" />
                        <flux:input wire:model="address" label="Address" />
                        <div class="grid grid-cols-3 gap-5">
                            <flux:input wire:model="city" label="City" />
                            <flux:select wire:model="state" label="State">
                                <flux:select.option></flux:select.option>
                                @foreach (App\Enum\State::cases() as $state)
                                    <flux:select.option :value="$state->value">
                                        {{ $state->label() }}
                                    </flux:select.option>
                                @endforeach
                            </flux:select>
                            <flux:input wire:model="zipCode" label="Zip Code" />
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <flux:input
                                mask="999-999-9999"
                                placeholder="999-999-9999"
                                wire:model="phone"
                                label="Phone Number"
                            />
                            <flux:select wire:model="type" label="Type" badge="Required">
                                <flux:select.option></flux:select.option>
                                @foreach (App\Enum\Type::cases() as $type)
                                    <flux:select.option :value="$type->value">{{ $type->label() }}</flux:select.option>
                                @endforeach
                            </flux:select>
                            <flux:input wire:model="currentSolutionName" label="Current Solution Name" />
                            <flux:input wire:model="currentSolutionUse" label="Current Solution Use" />
                        </div>
                        <flux:editor wire:model="notes" label="Notes" />
                    </div>
                </flux:card>
            </div>
            <div class="col-span-3">
                <flux:card>
                    <div class="space-y-5">
                        <flux:fieldset>
                            <flux:legend>Status</flux:legend>
                            <flux:switch
                                wire:model="devStatus"
                                label="In Development"
                                description="Turn on In Development when actively working on this dealership with the Sales Dev Rep."
                            />
                        </flux:fieldset>
                        <flux:separator class="my-5" variant="subtle" />
                        <flux:select
                            variant="listbox"
                            multiple
                            label="Consultants"
                            badge="required"
                            wire:model="selectedUsers"
                        >
                            @foreach ($users as $user)
                                <flux:select.option :value="$user->id">{{ $user->name }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Status" badge="required" wire:model="status">
                            <flux:select.option></flux:select.option>
                            @foreach (App\Enum\Status::cases() as $status)
                                <flux:select.option :value="$status->value">{{ $status->label() }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Rating" badge="required" wire:model="rating">
                            <flux:select.option></flux:select.option>
                            @foreach (App\Enum\Rating::cases() as $rating)
                                <flux:select.option :value="$rating->value">{{ $rating->label() }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <div class="flex gap-x-2">
                            <flux:button type="submit" class="w-full" variant="primary">Update</flux:button>
                            <flux:button class="w-full">Cancel</flux:button>
                        </div>
                    </div>
                </flux:card>
            </div>
        </div>
    </form>
</div>
