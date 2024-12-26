<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\School;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Why aren't 404s being thrown?
        Route::prefix('/{school:slug}')
            ->group(base_path('routes/sites.php'))
            ->name('site.slug.')
            ->middleware('web');

        Route::domain('{school:tld}')
            ->group(base_path('routes/sites.php'))
            ->name('site.tld.')
            ->middleware('web');

        Route::domain('{school:slug}.primaryweb.ie')
            ->group(base_path('routes/sites.php'))
            ->name('site.subdomain.')
            ->middleware('web');

        // see docs ->scopeBindings() - looks useful
    }
}
