<?php

namespace App\Livewire\Dealership;

use App\Enum\Rating;
use App\Enum\State;
use App\Enum\Status;
use App\Enum\Type;
use App\Models\Dealership;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Dealership $dealership;
    public string $name;
    public string $address;
    public string $city;
    public State $state;
    public string $zipCode;
    public string $phone;
    public Type $type;
    public string $currentSolutionName;
    public string $currentSolutionUse;
    public Status $status;
    public Rating $rating;
    public bool $devStatus;
    public array $selectedUsers;
    public $notes;

    public function mount(): void
    {
        $this->name = $this->dealership->name;
        $this->address = $this->dealership->address;
        $this->city = $this->dealership->city;
        $this->state = $this->dealership->state;
        $this->zipCode = $this->dealership->zip_code;
        $this->phone = $this->dealership->phone;
        $this->type = $this->dealership->type;
        $this->currentSolutionName = $this->dealership->current_solution_name;
        $this->currentSolutionUse = $this->dealership->current_solution_use;
        $this->status = $this->dealership->status;
        $this->rating = $this->dealership->rating;
        $this->devStatus = $this->dealership->in_development;
        $this->notes = $this->dealership->notes;
        $this->selectedUsers = $this->dealership->users()->pluck('id')->toArray();
    }

    public function updateDealership(): void
    {
        $this->dealership->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zipCode,
            'phone' => $this->phone,
            'in_development' => $this->devStatus,
            'type' => $this->type,
            'status' => $this->status,
            'rating' => $this->rating,
            'current_solution_name' => $this->currentSolutionName,
            'current_solution_use' => $this->currentSolutionUse,
            'notes' => $this->notes,
        ]);

        $this->dealership->users()->sync($this->selectedUsers);

        Flux::toast(
            text: 'Dealership updated successfully',
            heading: $this->name,
            variant: 'success'
        );
    }

    public function render(): View
    {
        return view('livewire.dealership.show', [
            'users' => $this->getUsers(),
        ])->title($this->name);
    }

    private function getUsers(): Collection
    {
        return User::query()
            ->orderBy('name')
            ->get();
    }
}
