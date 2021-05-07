<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return route('admin.index');
                    break;
                case 'customer':
                    return route('customer.index');
                    break;
                case 'employee':
                    return route('employee.index');
                    break;
                default:
                    return '/home';
                    break;
            }
        }
        return $next($request);
    }
}
