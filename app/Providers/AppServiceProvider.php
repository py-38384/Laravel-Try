<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        Gate::define('access.admin.dashboard', function(User $user){
            return $user->role === 'admin';
        });
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(15)->by(($request->user()?->id) ?: $request->ip());
        });
    }
}
