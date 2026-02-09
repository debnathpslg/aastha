<?php

namespace App\Enums;

enum MaritalStatusEnum: string
{
    case Maried = 'Married';
    case Single = 'Single';
    case Divorced = 'Divorced';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
