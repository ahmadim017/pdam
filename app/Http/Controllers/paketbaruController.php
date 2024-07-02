<?php

namespace App\Http\Controllers;

use App\Models\detailtender;
use App\Models\doklainnya;
use App\Models\jadwal;

use App\Models\kak;
use App\Models\nontender;
use App\Models\prosestender;
use App\Models\rancangankontrak;
use App\Models\uraianpekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class paketbaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Date::setLocale('id');
        $jadwal = jadwal::all();
        $detailtender = detailtender::where('jenistender','terbuka');
        $prosestender = prosestender::where('id_user',Auth::user()->id)->firstOrfail();
       
        $nontender = nontender::where('id_user', Auth::user()->id)->where('status','Verifikasi')->get();
     
        $detailtender = detailtender::all();
      

        return view('paketbaru.index',['jadwal' => $jadwal,'detailtender' => $detailtender,'prosestender' => $prosestender,'nontender' => $nontender]);
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
        
        $nontender = nontender::where('id_paket',$id)->firstOrFail();
        $detailtender = detailtender::all();
        $kak = kak::where('id_paket',$nontender->id_paket)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$nontender->id_paket)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$nontender->id_paket)->get();
        $doklainnya = doklainnya::where('id_paket',$nontender->id_paket)->get();
        $jadwal = jadwal::all();
        return view('paketbaru.show',[
            'nontender' => $nontender,
            'jadwal' => $jadwal,
            'kak' => $kak,
            'rancangankontrak'  => $rancangankontrak,
            'uraianpekerjaan' => $uraianpekerjaan,
            'doklainnya' => $doklainnya,
            'detailtender' => $detailtender,
        ]);
    }

    public function detail($id)
    {
        
        $nontender = nontender::where('id_paket',$id)->firstOrFail();
        $detailtender = detailtender::all();
        $kak = kak::where('id_paket',$nontender->id_paket)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$nontender->id_paket)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$nontender->id_paket)->get();
        $doklainnya = doklainnya::where('id_paket',$nontender->id_paket)->get();
        $jadwal = jadwal::all();
        return view('paketbaru.show',[
            'nontender' => $nontender,
            'jadwal' => $jadwal,
            'kak' => $kak,
            'rancangankontrak'  => $rancangankontrak,
            'uraianpekerjaan' => $uraianpekerjaan,
            'doklainnya' => $doklainnya,
            'detailtender' => $detailtender,
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
}
