<?php

namespace App\Enums;

enum GenderEnum: string
{
    case Male = 'Male';
    case Female = 'Female';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
