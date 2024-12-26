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
        $this->configureSiteRoutes();
    }

    /**
     * Configure school site routes and bind
     * the models for tlds, slugs and subdomains.
     */
    public function configureSiteRoutes():void  {

        // The order of each chained function is important here.
        // prefix and domain must come first
        // middleware must come before group for model bindings to work.
        // name must come before group for named routes to work
        Route::prefix('{school:slug}')
            ->middleware('web')
            ->name('site.slug.')
            ->group(base_path('routes/sites.php'));

        Route::domain('{school:tld}')
            ->middleware('web')
            ->name('site.tld.')
            ->group(base_path('routes/sites.php'));

        /**
         * If we want subdomain binding 
        Route::domain('{school:slug}.primaryweb.ie')
            ->middleware('web')
            ->name('site.subdomain.')
            ->group(base_path('routes/sites.php'));

         */

        // see docs ->scopeBindings() - looks useful
    }
}
