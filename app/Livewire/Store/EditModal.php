<?php

namespace App\Livewire\Store;

use App\Models\Store;
use Illuminate\View\View;
use Livewire\Component;

class EditModal extends Component
{
    public Store $store;

    public function render(): View
    {
        return view('livewire.store.edit-modal');
    }
}
