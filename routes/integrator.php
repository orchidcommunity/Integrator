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


    $integrator = new Orchid\Integrator\Integrator();


    $router->get('/', 'Orchid\Integrator\Integrator@map');

    foreach ($integrator->getRoute() as $route) {
        $router->resource($route['route'], $route['class'], [
            'as' => 'integrator',
        ]);
    }

});
