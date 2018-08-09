<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('options')) {
            return response('', 200)
                ->header('Access-Control-Allow-Methods', 'POST, GET, DELETE, OPTIONS, PUT')
                ->header('Access-Control-Allow-Headers', 'accept,authorization, content-type, x-xsrf-token, x-csrf-token');
        }

        return $next($request);
    }
}
