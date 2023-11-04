<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $expectedApiKey = '9X2pDfRlL7KpGtHw3JN4DfRlL9WQp7KpGtHw3JN4DfRlL';
        $apiKey = $request->header('x-api-key');

        if ($apiKey !== $expectedApiKey) {
            return response('Unauthorized', 401);
        }

        return $next($request);
    }
}
