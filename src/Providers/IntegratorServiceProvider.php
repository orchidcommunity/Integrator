<?php

namespace Orchid\Integrator\Providers;

use Illuminate\Support\ServiceProvider;

class IntegratorServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     */
    public function boot()
    {
        $this->registerProviders();
    }

    /**
     * registerProviders
     */
    public function registerProviders()
    {
        foreach ($this->provides() as $provide) {
            $this->app->register($provide);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ConsoleServiceProvider::class,
            RouteServiceProvider::class,
        ];
    }

}
