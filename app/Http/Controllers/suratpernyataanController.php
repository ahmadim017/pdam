<?php

namespace App\Http\Controllers;

use App\Models\suratpernyataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class suratpernyataanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratpernyataan = suratpernyataan::where('id_user', Auth::user()->id)->first();
        return view('suratpernyataan.index',['suratpernyataan' => $suratpernyataan]);
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
        $request->validate([
            'status' =>  'required',
        ]);

        $suratpernyataan = new suratpernyataan();
        $suratpernyataan->id_user = Auth::user()->id;
        $suratpernyataan->status = $request->status;
        $suratpernyataan->save();
        return redirect()->route('suratpernyataan.index')->with('status',' Anda sudah menyetujui Pernyataan tersebut');
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
}
