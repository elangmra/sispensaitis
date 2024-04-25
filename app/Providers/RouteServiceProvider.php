<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {


        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // Menentukan home route berdasarkan peran pengguna
        if (Auth::check() && Auth::user()->isAdmin()) {
            // Jika pengguna adalah admin
            $this->home = '/admin/dashboard';
        } elseif (Auth::check() && Auth::user()->isTeacher()){
            // Jika pengguna adalah guru
            $this->home = '/teacher/dashboard';
        } else {
            // Jika pengguna bukan admin
            $this->home = '/dashboard';
        }
    }
}
