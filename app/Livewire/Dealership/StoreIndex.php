<?php

namespace App\Livewire\Dealership;

use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class StoreIndex extends Component
{
    use WithPagination;

    public Dealership $dealership;
    public $sortBy = 'name';
    public $sortDirection = 'desc';

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Computed]
    public function stores()
    {
        return $this->dealership->stores()
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(15);
    }

    public function render(): View
    {
        return view('livewire.dealership.store-index');
    }
}
