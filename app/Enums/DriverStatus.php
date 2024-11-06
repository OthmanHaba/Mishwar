<?php

namespace App\Enums;

enum DriverStatus
{
    case Pending;
    case Approved;
    case Rejected;
    public static function names()
    {
        return [
            'Pending' => 'Pending',
            'Approved' => 'Approved',
            'Rejected' => 'Rejected',
        ];
    }
}
