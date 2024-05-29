<?php

namespace App\Http\Controllers;

use App\Models\pengajuanpenyedia;
use App\Models\pengurusperushaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pengurusperusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurusperusahaan = pengurusperushaan::where('id_user', Auth::user()->id)->get();
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
        return view('pengurusperusahaan.index',['pengurusperusahaan' => $pengurusperusahaan,'pengajuanpenyedia' => $pengajuanpenyedia]);
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
            'nik' => 'required|unique:pengurusperushaans|numeric|digits:16',
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'file' =>'required|max:1024|mimes:jpeg,png,pdf',
        ]);

        $pengurusperusahaan = new pengurusperushaan();
        $pengurusperusahaan->id_user = Auth::user()->id;
        $pengurusperusahaan->nik =  $request->nik;
        $pengurusperusahaan->nama = $request->nama;
        $pengurusperusahaan->jabatan = $request->jabatan;
        $pengurusperusahaan->alamat = $request->alamat;
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filepengurusperusahaan';
            $image->storeAs($folder, $filename);
            $pengurusperusahaan->file = $filename;
        }
        $pengurusperusahaan->save();
        return redirect()->route('pengurusperusahaan.index')->with('status','berhasil disimpan');
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
        $pengurusperusahaan = pengurusperushaan::findOrfail($id);
        if ($pengurusperusahaan->file && Storage::exists($pengurusperusahaan->file)) {
            Storage::delete($pengurusperusahaan->file);
        }
        $pengurusperusahaan->delete();
        return redirect()->route('pengurusperusahaan.index')->with('Status','Data berhasil dihapus');
    }
}
