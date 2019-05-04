<?php

namespace App\Http\Middleware;

use App\Exceptions\ForbiddenException;
use App\Models\User;
use Closure;

class AuthApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws ForbiddenException
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('authorization');

        if(empty($token)) throw new ForbiddenException();

        $userWithToken = User::query()
            ->where('api_token', '=', $token)
            ->first();

        if(empty($userWithToken)) throw new ForbiddenException();

        /** @var User $userWithToken */
        auth()->setUser($userWithToken);

        return $next($request);
    }
}
