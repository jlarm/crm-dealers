<?php

namespace App\Livewire\Dealership\Components;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Component;

class Navigation extends Component
{
    public Dealership $dealership;

    public function render(): View
    {
        return view('livewire.dealership.components.navigation');
    }
}
