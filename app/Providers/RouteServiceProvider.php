<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->namespace($this->namespace . '\Product')
            ->group(base_path('routes/route_product.php'));

        Route::middleware('web')
            ->namespace($this->namespace . '\Category')
            ->group(base_path('routes/route_frontend.php'));

        Route::middleware('web')
            ->namespace($this->namespace . '\Crud')
            ->group(base_path('routes/route_crud.php'));

        Route::middleware('web')
            ->namespace($this->namespace . '\Order')
            ->group(base_path('routes/route_order.php'));


        Route::middleware('web')
            ->namespace($this->namespace . '\Inventory')
            ->group(base_path('routes/route_inventory.php'));


        Route::middleware('web')
            ->namespace($this->namespace . '\Pasal')
            ->group(base_path('routes/route_pasal.php'));


        Route::middleware('web')
            ->namespace($this->namespace . '\Discount')
            ->group(base_path('routes/route_discount.php'));


    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
