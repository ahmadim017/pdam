<?php

namespace App\Http\Controllers;

use App\Jobs\SendUndanganVerifikasi;
use App\Models\detailtender;
use App\Models\doklainnya;
use App\Models\evaluasiakhir;
use App\Models\evaluasibiaya;
use App\Models\evaluasipenelitian;
use App\Models\evaluasiteknis;
use App\Models\jadwal;
use App\Models\jadwaltender;
use App\Models\jawaban;
use App\Models\kak;
use App\Models\kategorikualifikasi;
use App\Models\kategoriteknis;
use App\Models\klasifikasi;
use App\Models\kotakmasuk;
use App\Models\metodepengadaan;
use App\Models\pengajuanpenyedia;
use App\Models\penjelasan;
use App\Models\persyaratanevaluasiteknis;
use App\Models\persyaratankualifikasi;
use App\Models\prosestender;
use App\Models\rancangankontrak;
use App\Models\tahun;
use App\Models\tender;
use App\Models\undanganklarifikasi;
use App\Models\uraianpekerjaan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Config;
use Riskihajar\Terbilang\Facades\Terbilang;

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
        $detailtender = detailtender::all();
        return view('tender.index',['tender' => $tender,'jadwal' => $jadwal,'detailtender' => $detailtender]);
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
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $kak = kak::where('id_paket',$pengadaan->id)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$pengadaan->id)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$pengadaan->id)->get();
        $doklainnya = doklainnya::where('id_paket',$pengadaan->id)->get();
        $jadwal = jadwal::where('id_paket',$pengadaan->id)->first();
        return view('tender.show',[
            'pengadaan' => $pengadaan,
            'detailtender' => $detailtender,
            'kak' => $kak,
            'rancangankontrak' => $rancangankontrak,
            'uraianpekerjaan' => $uraianpekerjaan,
            'doklainnya' => $doklainnya,
            'pengajuan' => $pengajuan,
            'metodepengadaan' => $metodepengadaan,
            'jadwal' => $jadwal,
            'prosestender' => $prosestender,
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

    public function aanwizing($id)
    {
        $pengadaan = tender::findOrfail($id);
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $penjelasan = penjelasan::where('id_paket',$pengadaan->id)->get();
        $jawaban = jawaban::where('id_paket',$pengadaan->id)->get();
        return view ('tender.aanwizing',['detailtender' => $detailtender,'pengadaan' => $pengadaan,'prosestender' => $prosestender,'penjelasan' => $penjelasan,'jawaban' => $jawaban]);
    }

    public function baaanwizing($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $day = Date::createFromDate($detailtender->tglaanwizing)->format('l');
        $tanggal = Terbilang::date($detailtender->tglaanwizing);
        //dd($terbilang);
        $penjelasan = penjelasan::where('id_paket',$pengadaan->id)->get();
        $jawaban = jawaban::where('id_paket',$pengadaan->id)->get();
        $pdf = PDF::loadview('tender.baaanwizing',['day'=> $day,'tanggal' => $tanggal,'prosestender' => $prosestender,'detailtender' => $detailtender,'penjelasan' => $penjelasan, 'jawaban' => $jawaban]);
        return $pdf->stream();
    }

    public function bapembukaan($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->count();
        $day = Date::createFromDate($detailtender->tglpembukaanpenawaran)->format('l');
        $tanggal = Terbilang::date($detailtender->tglpembukaanpenawaran);
        //$rekanan = 

        $pdf = PDF::loadview('tender.bapembukaan',[
            'day'=> $day,
            'tanggal' => $tanggal,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
        ]);
        return $pdf->stream();
    }

    public function baevaluasi($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        //$prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $day = Date::createFromDate($detailtender->tglbaevaluasi)->format('l');
        $tanggal = Terbilang::date($detailtender->tglbaevaluasi);
        $evaluasiakhir = evaluasiakhir::where('id_paket', $pengadaan->id)
        ->orderBy('nilaiakhir', 'desc')
        ->get();


        $pdf = PDF::loadview('tender.baevaluasi',[
            'day'=> $day,
            'tanggal' => $tanggal,
            'evaluasiakhir' => $evaluasiakhir,
            'detailtender' => $detailtender,
        ]);
        return $pdf->stream();
    }

    public function baklarifikasi($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        //$prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $day = Date::createFromDate($detailtender->tglbaklarifikasi)->format('l');
        $tanggal = Terbilang::date($detailtender->tglbaklarifikasi);
        $evaluasiakhir = evaluasiakhir::where('id_paket', $pengadaan->id)
        ->orderBy('nilaiakhir', 'desc')
        ->get();


        $pdf = PDF::loadview('tender.baklarifikasi',[
            'day'=> $day,
            'tanggal' => $tanggal,
            'evaluasiakhir' => $evaluasiakhir,
            'detailtender' => $detailtender,
        ]);
        return $pdf->stream();
    }

    public function banegoisasi($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user', $detailtender->id_user)->first();
        $day = Date::createFromDate($detailtender->tglnegoisasi)->format('l');
        $tanggal = Terbilang::date($detailtender->tglnegoisasi);

        $pdf = PDF::loadview('tender.banegoisasi',[
            'day'=> $day,
            'tanggal' => $tanggal,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
        ]);
        return $pdf->stream();
    }

    public function bapengumumanpemenang($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user', $detailtender->id_user)->first();

        $pdf = PDF::loadview('tender.bapengumumanpemenang',[
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
        ]);
        return $pdf->stream();
    }

    public function bapenetapan($id)
    {
        Date::setlocale('id');
        Config::set('terbilang.locale', 'id');
        $pengadaan = tender::findOrfail($id);
        $detailtender= detailtender::where('id_paket',$pengadaan->id)->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user', $detailtender->id_user)->first();
        $hargapenawaran = Terbilang::make($prosestender->hargapenawaran , ' rupiah');
        $harganegoisasi = Terbilang::make($detailtender->hasilnegoisasi, ' rupiah');
        $penawarCount = prosestender::where('id_paket', $pengadaan->id)
                            ->whereNotNull('hargapenawaran')
                            ->where('hargapenawaran', '!=', 0)
                            ->count();
        //dd($penawarCount);

        $pdf = PDF::loadview('tender.bapenetapan',[
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'hargapenawaran' => $hargapenawaran,
            'harganegoisasi' => $harganegoisasi,
            'penawarCount' => $penawarCount
        ]);
        return $pdf->stream();
    }

    public function pembukaan($id)
    {
        $pengadaan = tender::findOrfail($id);
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        return view ('tender.pembukaan',['pengadaan' => $pengadaan,'prosestender' => $prosestender,'detailtender' => $detailtender]);
    }

    public function negoisasi($id)
    {
        $pengadaan = tender::findOrfail($id);
       
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $evaluasiakhir = evaluasiakhir::where('id_paket',$pengadaan->id)->orderBy('nilaiakhir','desc')->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user',$evaluasiakhir->id_user)->first();
        //dd($prosestender);
        return view ('tender.negoisasi',[
            'pengadaan' => $pengadaan,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'evaluasiakhir' => $evaluasiakhir]);
    }

    public function pengumumanpemenang($id)
    {
        $pengadaan = tender::findOrfail($id);
       
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $evaluasiakhir = evaluasiakhir::where('id_paket',$pengadaan->id)->orderBy('nilaiakhir','desc')->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user',$evaluasiakhir->id_user)->first();
        //dd($prosestender);
        return view ('tender.pengumumanpemenang',[
            'pengadaan' => $pengadaan,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'evaluasiakhir' => $evaluasiakhir]);
    }

    public function penetapan($id)
    {
        $pengadaan = tender::findOrfail($id);
       
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $evaluasiakhir = evaluasiakhir::where('id_paket',$pengadaan->id)->orderBy('nilaiakhir','desc')->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user',$evaluasiakhir->id_user)->first();
       
        return view ('tender.penetapan',[
            'pengadaan' => $pengadaan,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'evaluasiakhir' => $evaluasiakhir,

        ]);
    }

    public function klarifikasi($id)
    {
        $pengadaan = tender::findOrfail($id);
       
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $evaluasiakhir = evaluasiakhir::where('id_paket',$pengadaan->id)->orderBy('nilaiakhir','desc')->first();
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->where('id_user',$evaluasiakhir->id_user)->first();
        //dd($prosestender);
        return view ('tender.klarifikasi',[
            'pengadaan' => $pengadaan,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'evaluasiakhir' => $evaluasiakhir]);
    }

    public function penawaran($id)
    {
        $prosestender = prosestender::findOrfail($id);
        $kualifikasis = kategorikualifikasi::all();
        $persyaratankualifikasi = persyaratankualifikasi::all();
        $kategoriteknis = kategoriteknis::all();
        $evaluasiteknis = evaluasiteknis::all();
        $evaluasipenelitian = evaluasipenelitian::where('id_user', $prosestender->user->id)
        ->where('id_paket', $prosestender->tender->id)
        ->pluck('status', 'id_persyaratankualifikasi')
        ->toArray();
        $persyaratanevaluasiteknis = persyaratanevaluasiteknis::where('id_user', $prosestender->user->id)
        ->where('id_paket', $prosestender->tender->id)
        ->pluck('status', 'id_evaluasiteknis')
        ->toArray();
        $evaluasibiaya = evaluasibiaya::where('id_user', $prosestender->user->id)
        ->where('id_paket', $prosestender->tender->id)
        ->first();
        $evaluasiakhir = evaluasiakhir::where('id_user', $prosestender->user->id)
        ->where('id_paket', $prosestender->tender->id)
        ->first();
        $nilai = persyaratanevaluasiteknis::where('id_user', $prosestender->user->id)
        ->where('id_paket', $prosestender->tender->id)->get();
        $spesifikasiteknis = $nilai->whereIn('id_evaluasiteknis', range(1, 6))->sum('bobot');
        $suratdukungan = $nilai->whereIn('id_evaluasiteknis', range(7, 10))->sum('bobot') /4;
        $dokumenpelengkap = $nilai->whereIn('id_evaluasiteknis', range(11, 13))->sum('bobot');
        $jadwal = $nilai->whereIn('id_evaluasiteknis', '14')->sum('bobot');
        $identitas = $nilai->whereIn('id_evaluasiteknis', range(15, 17))->sum('bobot');
        $layanan = $nilai->whereIn('id_evaluasiteknis', '18')->sum('bobot');

        $nilaiteknis = $spesifikasiteknis + $suratdukungan + $dokumenpelengkap + $jadwal + $identitas + $layanan;
        //$nilaiharga = $evaluasi
        return view ('tender.penawaran',[
            'prosestender' => $prosestender,
            'kualifikasis'=> $kualifikasis,
            'persyaratankualifikasi' => $persyaratankualifikasi,
            'kategoriteknis' => $kategoriteknis,
            'evaluasiteknis' => $evaluasiteknis,
            'evaluasipenelitian' => $evaluasipenelitian,
            'persyaratanevaluasiteknis' => $persyaratanevaluasiteknis,
            'evaluasibiaya' => $evaluasibiaya,
            'nilaiteknis' => $nilaiteknis,
            'evaluasiakhir' => $evaluasiakhir,
        ]);
    }
        
    public function evaluasi($id)
    {
        $pengadaan = tender::findOrfail($id);
        $prosestender = prosestender::where('id_paket',$pengadaan->id)->get();
        $detailtender = detailtender::where('id_paket',$pengadaan->id)->first();
        $epData = evaluasipenelitian::where('id_paket', $pengadaan->id)->pluck('id_user')->toArray();
        $etData = persyaratanevaluasiteknis::where('id_paket', $pengadaan->id)->pluck('id_user')->toArray();
        $ebData = evaluasibiaya::where('id_paket', $pengadaan->id)->pluck('id_user')->toArray();
        $undanganverifikasi = undanganklarifikasi::where('id_paket', $pengadaan->id)->pluck('id_user')->toArray();

        $maxNilaiAkhir = evaluasiakhir::where('id_paket', $pengadaan->id)->max('nilaiakhir');


        $usersWithMaxHarga = evaluasiakhir::where('id_paket', $pengadaan->id)
                    ->where('nilaiakhir', $maxNilaiAkhir)
                    ->pluck('id_user')
                    ->toArray();

        return view ('tender.evaluasi',[
            'pengadaan' => $pengadaan,
            'prosestender' => $prosestender,
            'detailtender' => $detailtender,
            'epData' => $epData,
            'etData' => $etData,
            'ebData' => $ebData,
            'undanganverifikasi' => $undanganverifikasi,
            'usersWithMaxHarga' => $usersWithMaxHarga,
        ]);
    }

    public function sendemail(Request $request, $id)
    {
        $request->validate([
            'nosurat' => 'required',
            'tglsurat' => 'required',
            'waktuselesai' => 'required|after:waktumulai',
        ]);
    
     
            $prosestender = Prosestender::findOrFail($id);
    
            // Update or create undanganverifikasi record
            $undangan = undanganklarifikasi::updateOrCreate(
                [
                    'id_prosestender' => $prosestender->id,
                    'id_paket' => $prosestender->id_paket,
                    'id_user' => $prosestender->id_user,
                ],
                [
                    'nosurat' => $request->nosurat,
                    'tglsurat' => $request->tglsurat,
                    'waktumulai' => $request->waktumulai,
                    'waktuselesai' => $request->waktuselesai,
                ]
            );
    
            // Update or create kotakmasuk record
            Kotakmasuk::updateOrCreate(
                [
                    'id_paket' => $prosestender->id_paket,
                    'id_user' => $prosestender->id_user,
                ],
                [
                    'judul' => 'Undangan Verifikasi',
                    'tanggal' => Carbon::now()->toDateString(),
                ]
            );
    
            // Get the email address of the user
            $email = User::findOrFail($prosestender->id_user)->email;
    
            // Dispatch SendUndanganVerifikasi job
            SendUndanganVerifikasi::dispatch($email, $prosestender->id, $undangan);
    
            // Commit transaction if everything succeeds
           
    
            return redirect()->back()->with('status', 'Berhasil mengirim undangan');
    
      
    }

    public function cetak($id)
    {
        Date::setlocale('id');
        $prosestender = prosestender::findOrfail($id);
        $undangan = undanganklarifikasi::where('id_prosestender', $prosestender->id)->first();
        $pdf = PDF::loadview('kotakmasuk.verifikasi',['prosestender' => $prosestender, 'undangan'=> $undangan]);
        return $pdf->stream();
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
