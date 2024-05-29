<?php

namespace App\Http\Controllers;

use App\Models\doklainnya;
use App\Models\jadwal;
use App\Models\jadwaltender;
use App\Models\kak;
use App\Models\klasifikasi;
use App\Models\metodepengadaan;
use App\Models\nontender;
use App\Models\paketpekerjaan;
use App\Models\pengajuanpenyedia;
use App\Models\rancangankontrak;
use App\Models\tahun;
use App\Models\tender;
use App\Models\uraianpekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tender = tender::all(); 
        $jadwal = jadwal::all();
        return view('tender.index',['tender' => $tender,'jadwal' => $jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifkasi = klasifikasi::all();
        $tahun = tahun::all();
        return view('tender.create',['klasifikasi' => $klasifkasi,'tahun' => $tahun]);
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
            'namapaket' => 'required',
            'namakegiatan' => 'required',
            'hps' => 'required',
            'lokasi'=> 'required',
            'klasifikasi' => 'required',
            'tahunanggaran' => 'required',
        ]);

        $pengadaan = new tender;
        $pengadaan->created_by = Auth::user()->id;
        $pengadaan->namakegiatan = $request->namakegiatan;
        $pengadaan->namapaket = $request->namapaket;
        $pengadaan->pagu = str_replace('.', '', $request->pagu);
        $pengadaan->hps = str_replace('.', '', $request->hps);
        $pengadaan->lokasi = $request->lokasi;
        $pengadaan->tahunanggaran = $request->tahunanggaran;
        $pengadaan->klasifikasi = $request->klasifikasi;
        $pengadaan->waktupelaksanaan = $request->waktupelaksanaan;
        $pengadaan->save();
        return redirect()->route('tender.index')->with('status','Berhasil menambahkan paket pekerjaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengadaan = tender::findOrfail($id);
        $pengajuan = pengajuanpenyedia::where('konfirmasi','ya')->where('status','diterima')->get();
        $metodepengadaan = metodepengadaan::all();
        $nontender = nontender::where('id_paket',$pengadaan->id)->first();
        $kak = kak::where('id_paket',$pengadaan->id)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$pengadaan->id)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$pengadaan->id)->get();
        $doklainnya = doklainnya::where('id_paket',$pengadaan->id)->get();
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->first();
        return view('tender.show',[
            'pengadaan' => $pengadaan,
            'nontender' => $nontender,
            'kak' => $kak,
            'rancangankontrak' => $rancangankontrak,
            'uraianpekerjaan' => $uraianpekerjaan,
            'doklainnya' => $doklainnya,
            'pengajuan' => $pengajuan,
            'metodepengadaan' => $metodepengadaan,
            'jadwal' => $jadwal,
        ]);
    }

    public function view($id)
    {
        $pengadaan = tender::findOrfail($id);
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->get();
        $jadwalnontender = jadwaltender::all();
        return view ('jadwaltender.update',['jadwal' => $jadwal,'pengadaan' => $pengadaan,'jadwalnontender' =>  $jadwalnontender]);
    }

    public function buat($id)
    {
        $pengadaan = tender::findOrfail($id);
        $jadwal = jadwal::where('id_paket', $pengadaan->id)->first();
        $jadwalnontender = jadwaltender::all();
       
        return view ('jadwaltender.create',['jadwal' => $jadwal,'pengadaan' => $pengadaan,'jadwalnontender' =>  $jadwalnontender]);
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
