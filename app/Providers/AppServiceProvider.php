<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Response::macro('api', function ($data = null, $message = 'Success', $status = 200, $errors = null) {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'errors' => $errors,
            ], $status);
        });

        Response::macro('error', function ($message, $status = 400) {
            return Response::json([
                'errors'  => true,
                'message' => $message,
            ], $status);
        });
    }
}
