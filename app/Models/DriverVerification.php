<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverVerification extends Model
{
    /** @use HasFactory<\Database\Factories\DriverVerificationFactory> */
    use HasFactory;
    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
