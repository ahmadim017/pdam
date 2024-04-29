<?php

namespace App\Http\Controllers;

use App\Models\administrasi;
use App\Models\aktapendirian;
use App\Models\dokumenlainnya;
use App\Models\izinusaha;
use App\Models\pajak;
use App\Models\pengajuanpenyedia;
use App\Models\pengalaman;
use App\Models\pengurusperushaan;
use App\Models\perlengkapan;
use App\Models\perubahanpenyedia;
use App\Models\suratpernyataan;
use App\Models\tenagaahli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengajuanpenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
        $suratpernyataan = suratpernyataan::where('id_user', Auth::user()->id)->first();
        $administrasi = administrasi::where('id_user', Auth::user()->id)->first();
        $izinusaha = izinusaha::where('id_user', Auth::user()->id)->first();
        $aktapendirian = aktapendirian::where('id_user', Auth::user()->id)->first();
        $pengurusperusahaan = pengurusperushaan::where('id_user', Auth::user()->id)->first();
        $pajak = pajak::where('id_user', Auth::user()->id)->first();
        $dokumenlainnya = dokumenlainnya::where('id_user', Auth::user()->id)->first();
        $pengalamanpekerjaan = pengalaman::where('id_user', Auth::user()->id)->first();
        $tenagaahli = tenagaahli::where('id_user', Auth::user()->id)->first();
        $perlengkapan = perlengkapan::where('id_user', Auth::user()->id)->first();
        return view('verifikasi.index',[
            'pengajuanpenyedia' => $pengajuanpenyedia,
            'suratpernyataan' => $suratpernyataan,
            'administrasi' => $administrasi,
            'izinusaha' => $izinusaha,
            'aktapendirian' => $aktapendirian,
            'pengurusperusahaan' => $pengurusperusahaan,
            'pajak' => $pajak,
            'dokumenlainnya' => $dokumenlainnya,
            'pengalamanpekerjaan' => $pengalamanpekerjaan,
            'tenagaahli' => $tenagaahli,
            'perlengkapan' => $perlengkapan,
        ]);
    }

    public function perbaikan()
    {
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
        $suratpernyataan = suratpernyataan::where('id_user', Auth::user()->id)->first();
        $administrasi = administrasi::where('id_user', Auth::user()->id)->first();
        $izinusaha = izinusaha::where('id_user', Auth::user()->id)->first();
        $aktapendirian = aktapendirian::where('id_user', Auth::user()->id)->first();
        $pengurusperusahaan = pengurusperushaan::where('id_user', Auth::user()->id)->first();
        $pajak = pajak::where('id_user', Auth::user()->id)->first();
        $dokumenlainnya = dokumenlainnya::where('id_user', Auth::user()->id)->first();
        $pengalamanpekerjaan = pengalaman::where('id_user', Auth::user()->id)->first();
        $tenagaahli = tenagaahli::where('id_user', Auth::user()->id)->first();
        $perlengkapan = perlengkapan::where('id_user', Auth::user()->id)->first();
        $perubahan =  perubahanpenyedia::where('id_user', Auth::user()->id)->first();
        return view('verifikasi.perbaikan',[
            'pengajuanpenyedia' => $pengajuanpenyedia,
            'suratpernyataan' => $suratpernyataan,
            'administrasi' => $administrasi,
            'izinusaha' => $izinusaha,
            'aktapendirian' => $aktapendirian,
            'pengurusperusahaan' => $pengurusperusahaan,
            'pajak' => $pajak,
            'dokumenlainnya' => $dokumenlainnya,
            'pengalamanpekerjaan' => $pengalamanpekerjaan,
            'tenagaahli' => $tenagaahli,
            'perlengkapan' => $perlengkapan,
            'perubahan' => $perubahan,
        ]);
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
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user',Auth::user()->id)->first();
        $pengajuanpenyedia->konfirmasi = 'ya';
        $pengajuanpenyedia->save();
        return redirect()->route('verifikasi.index')->with('status','Selamat Anda Sudah mengirim Data Perusahaan dan sedang dalam proses verifikasi');
    }

    public function simpan(Request $request)
    {
        $perubahan = new perubahanpenyedia();
        $perubahan->id_user = Auth::user()->id;
        $perubahan->alasan = $request->alasan;
        $perubahan->save();
        return redirect()->route('verifikasi.perbaikan')->with('status','Berhasil Mengajukan Perubahan dan sedang dalam proses verifikasi');
    }

    public function terima(Request $request, $id)
    {
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user',$id)->first();
        $pengajuanpenyedia->konfirmasi = $request->konfirmasi;
        $pengajuanpenyedia->save();

        $perubahanpenyedia = perubahanpenyedia::where('id_user',$id)->first();
        $perubahanpenyedia->status = 'ya';
        $perubahanpenyedia->save();
        return redirect()->back()->with('status','Pengajuan Perubahan  Berhasil Diterima');
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
