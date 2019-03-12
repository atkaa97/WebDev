<?php

namespace App\Http\Middleware;

use App\Helpers;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Helpers::is_admin()) {
            return redirect(route('home'));
        }
        return $next($request);
    }
}
