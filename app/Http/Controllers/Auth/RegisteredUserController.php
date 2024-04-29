<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\pengajuanpenyedia;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'npwp' => ['required', 'unique:users', 'string', 'size:20'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
            'npwp.required' => 'NPWP harus diisi',
            'npwp.unique' => 'NPWP sudah digunakan',
            'npwp.size' => 'NPWP harus memiliki panjang 20 karakter',
            'email.unique' => 'Email yang anda masukkan telah terdaftar',
        ]);
        //$npwp = preg_replace('/\D/', '', $request->npwp);
        $role = 'USER';
        $user = User::create([
            'npwp' => $request->npwp,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        pengajuanpenyedia::create([
            'id_user' => $user->id,
            // Isi kolom-kolom lain sesuai kebutuhan
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
