<?php

namespace App\Livewire\Dealership;

use App\Enum\Rating;
use App\Enum\Type;
use App\Livewire\Dealership\Enums\FilterStatus;
use App\Livewire\Dealership\Traits\HasDealershipQuery;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Url;
use Livewire\Form;

class Filters extends Form
{
    use HasDealershipQuery;

    #[Url]
    public FilterStatus $status = FilterStatus::ALL;

    #[Url(as: 'ratings')]
    public array $rating = [];

    #[Url(as: 'types')]
    public array $types = [];

    #[Url]
    public array $users = [];

    #[Url]
    public bool $dev = false;

    public function apply($query)
    {
        $query = $this->applyStatus($query);
        $query = $this->applyTypes($query);
        $query = $this->applyRating($query);
        $query = $this->applyDevStatus($query);

        return $this->applyUsers($query);
    }

    public function statuses(): Collection
    {
        return collect(FilterStatus::cases())->map(function ($status) {
            $count = $this->applyStatus(
                $this->dealerQuery(),
                $status
            )->count();

            return [
                'value' => $status->value,
                'label' => $status->label(),
                'count' => $count,
            ];
        });
    }

    public function ratings(): Collection
    {
        return collect(Rating::cases())
            ->map(function ($rating) {
                return [
                    'value' => $rating->value,
                    'label' => $rating->label(),
                ];
            });
    }

    public function types(): Collection
    {
        return collect(Type::cases())->map(function ($type) {
            return [
                'value' => $type->value,
                'label' => $type->label(),
            ];
        });
    }

    public function users(): Collection
    {
        return User::query()
            ->whereNot('id', 1)
            ->whereHas('dealerships')
            ->get();
    }

    public function applyDevStatus($query)
    {
        if ($this->dev) {
            return $query->where('in_development', true);
        }

        return $query;
    }

    public function applyStatus($query, $status = null)
    {
        $status = $status ?? $this->status;

        if ($status === FilterStatus::ALL) {
            return $query;
        }

        return $query->where('status', $status);
    }

    public function applyRating($query, $rating = null)
    {
        $rating = $rating ?? $this->rating;

        if (empty($rating)) {
            return $query;
        }

        return $query->whereIn('rating', $rating);
    }

    public function applyTypes($query, $types = null)
    {
        $types = $types ?? $this->types;

        if (empty($types)) {
            return $query;
        }

        return $query->whereIn('type', $types);
    }

    public function applyUsers($query, $users = null)
    {
        $users = $users ?? $this->users;

        if (empty($users)) {
            return $query;
        }

        return $query->whereHas('users', fn ($q) => $q->whereIn('users.id', $users));
    }
}
