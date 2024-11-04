<?php

namespace App\Enums;

enum DriverStatus
{
    case Pending;
    case Approved;
    case Rejected;
    public static function values(): array
    {
        return [
            DriverStatus::Pending,
            DriverStatus::Approved,
            DriverStatus::Rejected,
        ];
    }
}
