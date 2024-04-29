<?php

namespace App\Http\Controllers;

use App\Models\pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalaman = pengalaman::where('id_user', Auth::user()->id)->get();
        return view('pengalaman.index',['pengalaman' => $pengalaman]);
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
            'namakontrak' => 'required',
            'nokontrak' => 'required',
            'lokasi' => 'required',
            'nilaikontrak' => 'required',
            'persentasipelaksanaan' => 'required',
            'tglpelaksanaan' => 'required',
           
        ]);

        $pengalaman = new pengalaman();
        $pengalaman->id_user = Auth::user()->id;
        $pengalaman->namakontrak =  $request->namakontrak;
        $pengalaman->nokontrak = $request->nokontrak;
        $pengalaman->lokasi = $request->lokasi;
        $pengalaman->instansi = $request->instansi;
        $pengalaman->nilaikontrak = str_replace('.', '', $request->nilaikontrak);
        $pengalaman->persentasipelaksanaan = $request->persentasipelaksanaan;
        $pengalaman->tglpelaksanaan = $request->tglpelaksanaan;
        $pengalaman->save();
        return redirect()->route('pengalaman.index')->with('status','berhasil disimpan');
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
        $pengalaman = pengalaman::findOrfail($id);
        $pengalaman->delete();
        return redirect()->route('pengalaman.index')->with('Status','Data berhasil dihapus');
    }
}
