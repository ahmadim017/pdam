<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Jika pengguna adalah admin, arahkan ke '/dashboard'
                if (Auth::guard($guard)->user()->role == 'ADMIN' ) {
                    return redirect('/dashboard');
                } elseif (Auth::guard($guard)->user()->role =='VERIFIKATOR') {
                    return redirect('/verifikator');
                // Jika pengguna adalah user, arahkan ke '/userdashboard'
                }elseif (Auth::guard($guard)->user()->role =='USER') {
                    return redirect('/userdashboard');
                }else {
                    return redirect(RouteServiceProvider::HOME);
                }
                // Tambahkan kasus lain jika perlu
            }
        }

        return $next($request);
    }
}
