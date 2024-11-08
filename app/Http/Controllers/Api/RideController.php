<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class RideController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'origin' => 'required|array',
            'origin.lat' => 'required',
            'origin.lng' => 'required',
            'destination' => 'required|array',
            'destination.lat' => 'required',
            'destination.lng' => 'required',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
        ]);

        $driver = User::where('role', UserType::Driver->name)
            ->where('active', true);
        //acting to create a document in the firebase assoited to a driver

        return response()->api('Ride requested successfully');
    }
}
