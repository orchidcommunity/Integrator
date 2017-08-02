<?php

namespace Orchid\Integrator\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Orchid\Integrator\Middleware\IntegratorMiddleware;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @internal param Router $router
     */
    public function boot()
    {
        Route::middlewareGroup('integrator', [
            IntegratorMiddleware::class,
        ]);

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../../../routes/integrator.php');
    }
}
