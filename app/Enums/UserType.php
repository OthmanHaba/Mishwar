<?php

namespace App\Enums;

enum UserType
{
    case Admin;
    case Rider;
    case Driver;
    public static function values(): array
    {
        return [
            'Admin' => 'Admin',
            'Rider' => 'Rider',
            'Driver' => 'Driver',
        ];
    }
}
