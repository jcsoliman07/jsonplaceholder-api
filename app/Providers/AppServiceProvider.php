<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        //
        Auth::viaRequest('custom-auth', function ($request) 
        {
            $user = User::where('username', $request->getUser())->first();

            if ($user && Hash::check($request->getPassword(), $user->password)) 
            {
                return $user;
            }

            return null;
        });
    }
}
