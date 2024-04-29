<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\kotakmasuk;
use App\Models\nontender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Jenssegers\Date\Date;
class nontenderController extends Controller
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
            'id_user' => 'required',
            'nosurat' => 'required',
            'metodepengadaan' => 'required',
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $nontender = nontender::updateOrCreate(
            ['id_paket' => $request->id_paket], // Kriteria pencarian
            [
                'id_user' => $request->id_user,
                'nosurat' => $request->nosurat,
                'tglsurat' => $request->tglsurat, 
                'metodepengadaan' => $request->metodepengadaan,
                'created_by' => Auth::user()->id,
            ]
        );

        kotakmasuk::updateOrCreate(
            ['id_user' => $request->id_paket], 
            [
                'judul' => 'undangan ',
                'id_paket' => $request->id_paket,
                'id_user' => $request->id_user,
                'tanggal' => $request->tglsurat, 
            ]
        );
        return redirect()->route('pengadaan.index')->with('status','Berhasil Membuat Paket');
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
        $nontender = nontender::findOrfail($id);
        $nontender->hargapenawaran = str_replace('.', '', $request->hargapenawaran);
        if ($request->hasFile('filepenawaran')) {
           
            $image = $request->file('filepenawaran');
            $extension = $image->getClientOriginalExtension();
            $name_file = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename =  $name_file . '_' . time() . "." . $extension; 
            $folder = '/public/dist/filepenawaran';
            $image->storeAs($folder, $filename);
            $nontender->filepenawaran = $filename;
            $nontender->name_file =  $name_file;
        }
        $nontender->save();
        return redirect()->back()->with('status','Anda Berhasil Memasukkan Penawaran');

    }

    public function evaluasi($id)
    {
        $nontender = nontender::findOrfail($id);
        $nontender->status = 'Diterima';
        $nontender->save();
        return redirect()->back()->with('status','Proses Evaluasi Berhasil');

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nontender = nontender::findOrFail($id);
        $nontender->delete();
        return redirect()->route('penyedia.daftar',[$nontender->id_paket])->with('Status', 'berhasil menghapus Penyedia');

    }
}
