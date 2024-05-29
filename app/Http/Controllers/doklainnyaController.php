<?php

namespace App\Http\Controllers;

use App\Models\doklainnya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class doklainnyaController extends Controller
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
            'file' => 'required|file|max:10048|mimes:doc,pdf,rar,jpeg,png,zip,xls,docx,xlsx', // Sesuaikan dengan ekstensi yang diizinkan
            'id_paket' => 'required' // Sesuaikan dengan aturan validasi yang diperlukan
        ]);
        
        // Inisialisasi model kak
        $kak = new doklainnya();
        $kak->id_paket = $request->id_paket;
        $kak->created_by = Auth::user()->id;
    
        // Cek apakah ada file yang diunggah
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filename = $name . '_' . time() . "." . $extension; 
            $folder = 'dist/doklainnya'; // Ubah sesuai dengan folder yang diinginkan
            $path = $image->storeAs($folder, $filename); // Simpan file ke dalam folder
            $kak->name_file = $filename;
            $kak->file = $path; // Simpan nama file ke dalam model
        }
    
        // Simpan model
        $kak->save();
    
        // Berikan respons JSON ke klien

        return redirect()->back()->with('status','File berhasil diunggah.');
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
        $kak = doklainnya::findOrfail($id);
        if ($kak->file && Storage::exists($kak->file)) {
            Storage::delete($kak->file);
        }
        $kak->delete();
        return redirect()->back()->with('Status','File berhasil dihapus.');
    }
}
