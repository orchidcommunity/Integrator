<?php

namespace Orchid\Integrator\Middleware;

use Closure;
use Illuminate\Http\Request;

class IntegratorMiddleware
{

    /**
     * @param  Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // TODO Validate Key
        if ($request->input('key', true) !== true) {
            abort(404);
        }

        return $next($request);
    }
}
