<?php

namespace App\Enums;

enum UserType
{
    case Admin;
    case Rider;
    case Driver;
    public function getRole(): string
    {
        return match ($this) {
            UserType::Admin => 'admin',
            UserType::Rider => 'rider',
            UserType::Driver => 'driver',
        };
    }
    public static function getAllRoles(): array
    {
        return [
            UserType::Admin => 'admin',
            UserType::Rider => 'rider',
            UserType::Driver => 'driver',
        ];
    }
}
