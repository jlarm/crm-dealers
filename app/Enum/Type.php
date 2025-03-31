<?php

namespace App\Enum;

enum Type: string
{
    case AUTOMOTIVE = 'automotive';
    case RV = 'rv';
    case MOTORSPORTS = 'motorsports';
    case MARITIME = 'maritime';
    case ASSOCIATION = 'association';

    public function label(): string
    {
        return match ($this) {
            self::AUTOMOTIVE => 'Automotive',
            self::RV => 'RV',
            self::MOTORSPORTS => 'Motorsports',
            self::MARITIME => 'Maritime',
            self::ASSOCIATION => 'Association',
        };
    }
}
