<?php

namespace App\Enum;

enum Rating: string
{
    case HOT = 'hot';
    case WARM = 'warm';
    case COLD = 'cold';

    public function label(): string
    {
        return match ($this) {
            self::HOT => 'Hot',
            self::WARM => 'Warm',
            self::COLD => 'Cold',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::HOT => 'red',
            self::WARM => 'yellow',
            self::COLD => 'blue',
        };
    }
}
