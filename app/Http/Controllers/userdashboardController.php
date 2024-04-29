<?php

namespace App\Http\Controllers;

use App\Models\berkas;
use App\Models\pengajuanpenyedia;
use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user',Auth::user()->id)->first();
        $profil = profil::where('id_user',Auth::user()->id)->first();
        //$berkas = berkas::where('id_user', Auth::user()->id)->first();
        return view('userdashboard',['pengajuanbeasiswa' => $pengajuanpenyedia,'profil' => $profil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Auth::user()->role == 'USER'){
                return $next($request);
            }
            return redirect()->guest('/403');
        });
    }
}
