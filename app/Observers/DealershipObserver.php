<?php

namespace App\Observers;

class DealershipObserver
{
    public function created()
    {
        cache()->forget('dealerships');
    }

    public function updated()
    {
        cache()->forget('dealerships');
    }
}
