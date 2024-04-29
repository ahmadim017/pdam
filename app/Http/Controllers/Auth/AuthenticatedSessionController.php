<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if (Auth::check() && Auth::user()->status == 'ACTIVE') {
            if (Auth::user()->role == 'ADMIN') {
                return redirect('dashboard');
            }  elseif (Auth::user()->role == 'VERIFIKATOR'){
                return redirect('verifikator');
                
            } elseif (Auth::user()->role == 'USER') {
                return redirect('userdashboard');
            } else {
                Auth::logout(); // Logout pengguna jika tidak memenuhi syarat
                return redirect('login')->with('status', 'Akun Anda tidak aktif.');
            }
        } else {
            Auth::logout(); // Logout pengguna jika tidak aktif
            return redirect('login')->with('status', 'Akun Anda tidak aktif.');
        }
        
        
        $request->session()->regenerate();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
