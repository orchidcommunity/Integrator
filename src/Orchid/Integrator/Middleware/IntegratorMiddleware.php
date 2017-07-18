<?php

namespace Orchid\Integrator\Middleware;

use Closure;
use Illuminate\Http\Response;

class IntegratorMiddleware
{

    /**
     * @param          $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * @todo check parameter
         */
        if ($request->get('key', true) != true) {
            abort(404);
        }

        return $next($request);
    }
}
