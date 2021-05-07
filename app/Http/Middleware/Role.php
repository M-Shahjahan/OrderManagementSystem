<?php


namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;


class Role
{
    public function handle($request, Closure $next, ... $roles) {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/login');

        $user = Auth::user();
        foreach ($roles as $role){
            if($user->role==$role){
                return $next($request);
            }
        }
        abort(403,'Cannot access restricted Page');
    }
}
