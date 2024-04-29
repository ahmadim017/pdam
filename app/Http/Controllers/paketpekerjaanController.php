<?php

namespace App\Http\Controllers;

use App\Models\doklainnya;
use App\Models\jadwal;
use App\Models\jadwalnontender;
use App\Models\klasifikasi;
use App\Models\nontender;
use App\Models\paketpekerjaan;
use App\Models\pengajuanpenyedia;
use App\Models\tahun;
use App\Models\kak;
use App\Models\kontrak;
use App\Models\metodepengadaan;
use App\Models\rancangankontrak;
use App\Models\uraianpekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paketpekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = paketpekerjaan::all();
        $nontender = nontender::all(); 
        $jadwal = jadwal::all();
        return view('pengadaan.index',['pengadaan' => $pengadaan,'nontender' => $nontender,'jadwal' => $jadwal]);
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
        return view('pengadaan.create',['klasifikasi' => $klasifkasi,'tahun' => $tahun]);
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

        $pengadaan = new paketpekerjaan;
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
        return redirect()->route('pengadaan.index')->with('status','Berhasil menambahkan paket pekerjaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $pengadaan = paketpekerjaan::findOrfail($id);
        $pengajuan = pengajuanpenyedia::where('konfirmasi','ya')->where('status','diterima')->get();
        $metodepengadaan = metodepengadaan::all();
        $nontender = nontender::where('id_paket',$pengadaan->id)->first();
        $kak = kak::where('id_paket',$pengadaan->id)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$pengadaan->id)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$pengadaan->id)->get();
        $doklainnya = doklainnya::where('id_paket',$pengadaan->id)->get();
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->first();
        return view('pengadaan.show',[
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

    public function hapus($id)
    {
        $nontender = nontender::findOrfail($id);
        $nontender->delete();
        return redirect()->back()->with('Status','Data berhasil dihapus');
    }

    public function view($id)
    {
        $pengadaan = paketpekerjaan::findOrfail($id);
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->get();
        $jadwalnontender = jadwalnontender::all();
        return view ('jadwal.update',['jadwal' => $jadwal,'pengadaan' => $pengadaan,'jadwalnontender' => $jadwalnontender]);
    }

    public function buat($id)
    {
        $pengadaan = paketpekerjaan::findOrfail($id);
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->first();
        $jadwalnontender = jadwalnontender::all();
        return view ('jadwal.create',['jadwal' => $jadwal,'pengadaan' => $pengadaan,'jadwalnontender' => $jadwalnontender]);
    }

    public function evaluasi($id)
    {
        $pengadaan = paketpekerjaan::findOrfail($id);
        $nontender = nontender::where('id_paket',$pengadaan->id)->first();
        return view ('pengadaan.evaluasi',['pengadaan' => $pengadaan,'nontender' => $nontender]);
    }

    public function kontrak($id)
    {
        $pengadaan = paketpekerjaan::findOrfail($id);
        $nontender = nontender::where('id_paket',$pengadaan->id)->first();
        $kontrak = kontrak::where('id_paket',$pengadaan->id)->first();
        return view ('pengadaan.kontrak',['pengadaan' => $pengadaan,'nontender' => $nontender,'kontrak' => $kontrak]);
    }

    public function daftarpenyedia($id)
    {
        $pengadaan = paketpekerjaan::findOrfail($id);
        $nontender = nontender::where('id_paket',$id)->get();
        $pengajuan = pengajuanpenyedia::where('konfirmasi','ya')->where('status','diterima')->get();
        return view('penyedia.daftar',['pengadaan' => $pengadaan,'nontender' => $nontender,'pengajuan' => $pengajuan]); 
    }
}
