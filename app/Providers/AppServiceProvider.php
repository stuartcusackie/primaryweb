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

        // The order of each chained function is important here.
        // prefix and domain must come first
        // middleware must come before group for model bindings to work.
        Route::prefix('{school:slug}')
            ->middleware('web')
            ->group(base_path('routes/sites.php'))
            ->name('site.slug.');

        Route::domain('{school:tld}')
            ->middleware('web')
            ->group(base_path('routes/sites.php'))
            ->name('site.tld.');

        Route::domain('{school:slug}.primaryweb.ie')
            ->middleware('web')
            ->group(base_path('routes/sites.php'))
            ->name('site.subdomain.');

    

        // see docs ->scopeBindings() - looks useful
    }
}
