<?php

namespace Orchid\Integrator;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Orchid\Integrator\Console\Commands\MakeAdminForm;
use Orchid\Integrator\Middleware\IntegratorMiddleware;

class IntegratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAdminForm::class,
            ]);
        }

        Route::middlewareGroup('integration', [IntegratorMiddleware::class]);

        $this->loadRoutesFrom(__DIR__.'/../../routes/integrator.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(Integrator::class, function () {
            return new Integrator();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            Integrator::class,
        ];
    }
}
