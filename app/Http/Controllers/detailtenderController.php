<?php

namespace App\Http\Controllers;

use App\Models\aktapendirian;
use App\Models\aktaperubahan;
use App\Models\detailtender;
use App\Models\dokumenlainnya;
use App\Models\evaluasiakhir;
use App\Models\izinusaha;
use App\Models\pajak;
use App\Models\pengalaman;
use App\Models\pengesahan;
use App\Models\pengurusperushaan;
use App\Models\perlengkapan;
use App\Models\prosestender;
use App\Models\tenagaahli;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class detailtenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'metodepengadaan' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);
        
        $detailTender = detailtender::updateOrCreate(
            ['id_paket' => $request->id_paket], // Kriteria pencarian
            [
                'jenistender' => $request->jenistender,
                'tglsurat' => $request->tglsurat, 
                'metodepengadaan' => $request->metodepengadaan,
                'created_by' => Auth::user()->id,
            ]
        );

        
        if ($request->jenistender == 'tertutup') {
            // Filter out null values
            $id_users = array_filter($request->id_user, function($value) {
                return !is_null($value) && $value !== '';
            });
    
            foreach ($id_users as $id_user) {
                prosestender::updateOrCreate([
                    'id_paket' => $detailTender->id_paket,
                    'id_user' => $id_user,
                ]);
            }
        }
    
        return redirect()->back()->with('status','Berhasil Membuat Paket');

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

    public function detailpenyedia($id)
    {
        $pengajuan = detailtender::where('id_user', $id)->first();
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
        return view('tender.detailpenyedia',[
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

    public function baaanwizing(Request $request, $id)
    {
        $request->validate([
            'baaanwizing' => 'required',
            'tglaanwizing' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);
        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->baaanwizing = $request->baaanwizing;
        $detailtender->tglaanwizing = $request->tglaanwizing;
        $detailtender->save();
        return redirect()->back()->with('status','Berita Acara Pemberian Penjelasan Berhasil disimpan');
    }

    public function pembukaanpenawaran(Request $request, $id)
    {
        $request->validate([
            'bapembukaanpenawaran' => 'required',
            'tglpembukaanpenawaran' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->bapembukaanpenawaran = $request->bapembukaanpenawaran;
        $detailtender->tglpembukaanpenawaran = $request->tglpembukaanpenawaran;
        $detailtender->save();
        return redirect()->back()->with('status','Berita Acara Pembukaan penawaran berhasil disimpan');
    }

    public function baklarifikasi(Request $request, $id)
    {
        $request->validate([
            'baklarifikasi' => 'required',
            'tglbaklarifikasi' => 'required',
            'memenuhiklarifikasi' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->baklarifikasi = $request->baklarifikasi;
        $detailtender->tglbaklarifikasi = $request->tglbaklarifikasi;
        $detailtender->memenuhiklarifikasi = $request->memenuhiklarifikasi;
        $detailtender->save();
        return redirect()->back()->with('status','Berita Acara Klarfikasi dan Verifikasi berhasil disimpan');
    }

    public function baevaluasi(Request $request, $id)
    {
        $request->validate([
            'baevaluasi' => 'required',
            'tglbaevaluasi' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);
        $evaluasiakhir = evaluasiakhir::where('id_paket', $id)->orderBy('nilaiakhir','desc')->first();
        //dd($evaluasiakhir->id_user);
        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->baevaluasi = $request->baevaluasi;
        $detailtender->tglbaevaluasi = $request->tglbaevaluasi;
        $detailtender->id_user = $evaluasiakhir->id_user;
        $detailtender->save();

       

        return redirect()->back()->with('status','Berita Acara Hasil Evaluasi Berhasil disimpan');
    }

    public function banegoisasi(Request $request, $id)
    {
        $request->validate([
            'banegoisasi' => 'required',
            'tglnegoisasi' => 'required',
            'hasilnegoisasi' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->banegoisasi = $request->banegoisasi;
        $detailtender->tglnegoisasi = $request->tglnegoisasi;
        $detailtender->hasilnegoisasi = str_replace('.', '', $request->hasilnegoisasi); 
        $detailtender->save();
        return redirect()->back()->with('status','Berita Acara Negoisasi dan Biaya berhasil disimpan');
    }

    public function bapengumumanpemenang(Request $request, $id)
    {
        $request->validate([
            'bapengumumanpemenang' => 'required',
            'tglpengumuman' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $detailtender = detailtender::where('id_paket', $id)->first();
        $detailtender->bapengumumanpemenang = $request->bapengumumanpemenang;
        $detailtender->tglpengumuman = $request->tglpengumuman;
        $detailtender->save();
        return redirect()->back()->with('status','Pengumuman Pemenanang berhasil disimpan');
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
