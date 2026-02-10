<?php

namespace App\Enums;

enum YesNoEnum: string
{
    case Yes = 'Yes';
    case No = 'No';

    public static function options(): array
    {
        return [
            0 => self::No->value,
            1 => self::Yes->value,
        ];
    }
}
