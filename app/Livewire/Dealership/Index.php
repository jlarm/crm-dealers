<?php

namespace App\Livewire\Dealership;

use App\Livewire\Dealership\Traits\Searchable;
use App\Models\Dealership;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use Searchable, WithPagination;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

    public Filters $filters;

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters(): void
    {
        $this->filters->reset();
    }

    public function render(): View
    {
        $cacheKey = $this->generateCacheKey();

        $dealerships = cache()->remember($cacheKey, now()->addMinutes(30), function () {
            $query = $this->dealerQuery()->with('users');
            $query = $this->applySearch($query);
            $query = $this->filters->apply($query);

            return $query
                ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
                ->paginate(10);
        });

        return view('livewire.dealership.index', [
            'dealerships' => $dealerships,
        ]);
    }

    private function generateCacheKey(): string
    {
        return sprintf(
            'dealerships.%s.%s.%s.%s.%s.%s',
            auth()->id(),
            $this->page ?? 1,
            $this->search ?? '',
            $this->sortBy,
            $this->sortDirection,
            md5(json_encode($this->filters, JSON_THROW_ON_ERROR))
        );
    }

    private function dealerQuery()
    {
        if (! auth()->user()->is_admin) {
            return auth()->user()->dealerships();
        }

        return Dealership::query();
    }
}
