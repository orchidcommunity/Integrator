<?php

/*
|--------------------------------------------------------------------------
| Post API Routes
|--------------------------------------------------------------------------
|
| Base route
|
*/

$this->group([
    'middleware' => ['integrator'],
    'prefix'     => 'integrator',
], function ($router) {

    $router->get('/', 'Orchid\Integrator\Integrator@map');

    foreach (app(Orchid\Integrator\Integrator::class)->getRoute() as $route) {
        $router->resource($route['route'], $route['class'], [
            'as' => 'integrator',
        ]);
    }
});
