<?php

namespace App\Http\Controllers;

use App\Models\administrasi;
use App\Models\badanusaha;
use App\Models\kabupaten;
use App\Models\pengajuanpenyedia;
use App\Models\provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class administrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = provinsi::all();
        $kabupaten = kabupaten::all();
        $badanusaha = badanusaha::all();
        $administrasi = administrasi::where('id_user', Auth::user()->id)->get()->first();
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
       // $kabupatens = kabupaten::where('id_provinsi', $administrasi->id_provinsi)->get();
        return view('administrasi.index',[
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'pengajuanpenyedia' => $pengajuanpenyedia,
            'badanusaha' => $badanusaha,
            'administrasi' => $administrasi,
        ]);
    }

    public function getKabupaten($id)
    {
        $kabupatens = kabupaten::where('id_provinsi', $id)->get(); // Gantilah Kabupaten dengan model atau data sesuai kebutuhan
        return response()->json($kabupatens);
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
            'npwp' => 'required',
            'nama' => 'required',
            'namadirektur'  => 'required',
            'telpon' => 'required|numeric', // Sesuaikan sesuai kebutuhan
            'email' => 'required', // Sesuaikan sesuai nama tabel
            'id_badanusaha' => 'required',
            'alamat' => 'required',
            'id_provinsi' => 'required',
            'id_kabupaten' => 'required',
            'nopkp' => 'required',
            'filenpwp' => 'max:2048|mimes:jpeg,png,pdf',
            'filepkp' => 'max:2048|mimes:jpeg,png,pdf', // Ukuran dalam KB
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
            'mimes' => 'Pastikan File Bertipe image, JPG,PNG',
            'max' => 'File yang diupload maksimal 2MB',
        ]);
        // Cek apakah file ada dalam request
       
        $userId = Auth::user()->id;
        
        $administrasi = administrasi::updateOrCreate(
            ['id_user' => $userId],
            [
                'npwp' => $request->npwp,
                'nama' => $request->nama,
                'namadirektur' => $request->namadirektur,
                'telpon' => $request->telpon,
                'email' => strtolower($request->email),
                'id_badanusaha' => $request->id_badanusaha,
                'alamat' => $request->alamat,
                'id_provinsi' => $request->id_provinsi,
                'id_kabupaten' => $request->id_kabupaten,
                'nopkp' => $request->nopkp,
                'kodepos' => $request->kodepos,
                'kantorcabang' => $request->kantorcabang,
                'website' => $request->website,
               
            ]
        );

        if ($request->hasFile('filenpwp')) {
            // Hapus file lama jika ada
            if ($administrasi->filenpwp && Storage::exists($administrasi->filenpwp)) {
                Storage::delete($administrasi->filenpwp);
            }
        
            $image = $request->file('filenpwp');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filenpwp';
            $image->storeAs($folder, $filename);
            $administrasi->filenpwp = $filename;
        }
        
        // Periksa dan simpan file pkp
        if ($request->hasFile('filepkp')) {
            // Hapus file lama jika ada
            if ($administrasi->filepkp && Storage::exists($administrasi->filepkp)) {
                Storage::delete($administrasi->filepkp);
            }
        
            $image = $request->file('filepkp');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filepkp';
            $image->storeAs($folder, $filename);
            $administrasi->filepkp = $filename;
        }

        $administrasi->save();

        return redirect()->route('administrasi.index')->with('status','Data berhasil disimpan');
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
