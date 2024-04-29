<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    public function password()
    {
        return view('user.password');
    }

    public function gantipassword(UpdatePasswordRequest $request)
    {

    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect()->route('user.password')->with('status','Password Berhasil diganti');
    }

}
