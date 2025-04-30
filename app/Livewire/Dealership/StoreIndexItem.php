<?php

namespace App\Livewire\Dealership;

use App\Models\Store;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class StoreIndexItem extends Component
{
    public Store $store;
    public $name;
    public $address;
    public $city;
    public $state;
    public $zip_code;
    public $phone;

    public function mount(): void
    {
        $this->name = $this->store->name;
        $this->address = $this->store->address;
        $this->city = $this->store->city;
        $this->state = $this->store->state;
        $this->zip_code = $this->store->zip_code;
        $this->phone = $this->store->phone;
    }

    public function updateStore(): void
    {
        $this->store->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
        ]);

        $this->dispatch('refreshStores');

        Flux::toast(
            text: 'Store updated successfully',
            heading: $this->name,
            variant: 'success'
        );
    }

    public function render(): View
    {
        return view('livewire.dealership.store-index-item');
    }
}
