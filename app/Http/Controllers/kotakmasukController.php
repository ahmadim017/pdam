<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kotakmasuk;
use App\Models\nontender;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class kotakmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kotakmasuk = kotakmasuk::where('id_user', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(20);
        return view('kotakmasuk.index',['kotakmasuk' => $kotakmasuk]);
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
        Date::setLocale('id');
        $kotakmasuk = kotakmasuk::findOrfail($id);
        $kotakmasuk->status = 'ya';
        $kotakmasuk->save();
        $jadwal = jadwal::where('id_paket', $kotakmasuk->id_paket)->get();
        return view('kotakmasuk.show', ['kotakmasuk' => $kotakmasuk, 'jadwal' => $jadwal]);
    }

    public function cetak($id)
    {
        Date::setlocale('id');
        $nontender = nontender::where('id_paket',$id)->first();
        $jadwal = jadwal::where('id_paket', $nontender->id_paket)->get();
        $pdf = PDF::loadview('kotakmasuk.undangan',['nontender' => $nontender, 'jadwal'=>$jadwal]);
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
