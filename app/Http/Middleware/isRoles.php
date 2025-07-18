<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // $user = Auth::user();
        // if ($user !== $roles) {
        //     return  abort(403);
        // }

        if (auth()->user()->roles !== $roles) {
            return abort(403);
        }
        return $next($request);
    }
}
