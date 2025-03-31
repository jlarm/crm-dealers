<?php

namespace App\Livewire\Dealership\Traits;

use App\Models\Dealership;

trait HasDealershipQuery
{
    private function dealerQuery()
    {
        if (! auth()->user()->is_admin) {
            return auth()->user()->dealerships();
        }

        return Dealership::query();
    }
}
