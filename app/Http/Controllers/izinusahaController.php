<?php

namespace App\Http\Controllers;

use App\Models\izinusaha;
use App\Models\klasifikasi;
use App\Models\pengajuanpenyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class izinusahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = klasifikasi::all();
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
        $izinusaha = izinusaha::where('id_user', Auth::user()->id)->get();
        return view('izinusaha.index',[
            'izinusaha' => $izinusaha,
            'klasifikasi' => $klasifikasi,
            'pengajuanpenyedia' => $pengajuanpenyedia,
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
        $request->validate([
            'id_klasifikasi' => 'required',
            'jenisizin' => 'required',
            'nomorizin' => 'required',
            'berlaku' => 'required',
            'instansipemberi' => 'required',
            'kualifikasi' => 'required',
            'modalusaha' => 'required',
            'fileizin' => 'required|max:2048|mimes:jpeg,png,pdf',
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
            'mimes' => 'Pastikan File Bertipe image, JPG,PNG',
            'max' => 'File yang diupload maksimal 2MB',
        ]);

        //dd($request->id_klasifikasi);
        $izinusaha = new izinusaha();
        $izinusaha->id_user = Auth::user()->id;
        $izinusaha->id_klasifikasi	 = $request->id_klasifikasi;
        $izinusaha->jenisizin  = $request->jenisizin;
        $izinusaha->nomorizin    = $request->nomorizin;
        $izinusaha->berlaku = $request->berlaku;
        $izinusaha->instansipemberi = $request->instansipemberi;
        $izinusaha->kualifikasi = $request->kualifikasi;
        $izinusaha->modalusaha = str_replace('.', '', $request->modalusaha);
        $izinusaha->keterangan = $request->keterangan;
        if ($request->hasFile('fileizin')) {
           
            $image = $request->file('fileizin');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/fileizin';
            $image->storeAs($folder, $filename);
            $izinusaha->fileizin = $filename;
        }
        $izinusaha->save();
        return redirect()->route('izinusaha.index')->with('status','Data Berhasil disimpan');
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
        $izinusaha = izinusaha::findOrfail($id);
        if ($izinusaha->fileizin && Storage::exists($izinusaha->fileizin)) {
            Storage::delete($izinusaha->fileizin);
        }
        $izinusaha->delete();
        return redirect()->route('izinusaha.index')->with('Status','Data berhasil dihapus');
    }
}
