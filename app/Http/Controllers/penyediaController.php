<?php

namespace App\Http\Controllers;

use App\Models\aktapendirian;
use App\Models\aktaperubahan;
use App\Models\dokumenlainnya;
use App\Models\izinusaha;
use App\Models\pajak;
use App\Models\pengajuanpenyedia;
use App\Models\pengalaman;
use App\Models\pengesahan;
use App\Models\pengurusperushaan;
use App\Models\perlengkapan;
use App\Models\perubahanpenyedia;
use App\Models\tenagaahli;
use Illuminate\Http\Request;

class penyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = pengajuanpenyedia::where('konfirmasi','ya')->get();
        //dd($pengajuan);
        return view('penyedia.index',['pengajuan' => $pengajuan]);
    }

    public function perubahan()
    {
        $perubahan = perubahanpenyedia::where('status','tidak')->get();
        //dd($pengajuan);
        return view('penyedia.perubahan',['perubahan' => $perubahan]);
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
        $pengajuan = pengajuanpenyedia::findOrfail($id);
        $izinusaha = izinusaha::where('id_user',$pengajuan->id_user)->get();
        $aktapendirian = aktapendirian::where('id_user',$pengajuan->id_user)->get();
        $aktaperubahan = aktaperubahan::where('id_user',$pengajuan->id_user)->get();
        $pengesahan = pengesahan::where('id_user',$pengajuan->id_user)->get();
        $pengurusperusahaan = pengurusperushaan::where('id_user',$pengajuan->id_user)->get();
        $pajak = pajak::where('id_user',$pengajuan->id_user)->get();
        $dokumenlainnya = dokumenlainnya::where('id_user',$pengajuan->id_user)->get();
        $pengalamanpekerjaan = pengalaman::where('id_user',$pengajuan->id_user)->get();
        $tenagaahli = tenagaahli::where('id_user',$pengajuan->id_user)->get();
        $perlengkapan = perlengkapan::where('id_user',$pengajuan->id_user)->get();
        return view('penyedia.show',[
            'pengajuan' => $pengajuan,
            'izinusaha' => $izinusaha,
            'aktapendirian' => $aktapendirian,
            'aktaperubahan' => $aktaperubahan,
            'pengesahan' => $pengesahan,
            'pengurusperusahaan' => $pengurusperusahaan,
            'pajak' => $pajak,
            'dokumenlainnya' => $dokumenlainnya,
            'pengalamanpekerjaan' => $pengalamanpekerjaan,
            'tenagaahli' => $tenagaahli,
            'perlengkapan' => $perlengkapan,
        ]);
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
        $pengajuan = pengajuanpenyedia::findOrfail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();
        return redirect()->route('penyedia.index')->with('status','data penyedia diterima');
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
