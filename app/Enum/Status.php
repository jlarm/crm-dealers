<?php

namespace App\Enum;

enum Status: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case IMPORTED = 'imported';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::IMPORTED => 'Imported',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => 'green',
            self::INACTIVE => 'red',
            self::IMPORTED => 'blue',
        };
    }
}
