<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('document_url');
            $table->enum('status', App\Enums\DriverStatus::values())->default(App\Enums\DriverStatus::Pending);
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_verifications');
    }
};
