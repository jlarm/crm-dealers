<?php

namespace App\Livewire\Dealership\Enums;

use App\Enum\Status;

enum FilterStatus: string
{
    case ALL = 'all';
    case ACTIVE = Status::ACTIVE->value;
    case INACTIVE = Status::INACTIVE->value;
    case IMPORTED = Status::IMPORTED->value;

    public function label(): string
    {
        return match ($this) {
            self::ALL => 'All',
            self::ACTIVE => Status::ACTIVE->label(),
            self::INACTIVE => Status::INACTIVE->label(),
            self::IMPORTED => Status::IMPORTED->label(),
        };
    }
}
