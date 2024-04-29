<?php

namespace App\Http\Controllers;

use App\Models\perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class perlengkapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perlengkapan = perlengkapan::where('id_user',Auth::user()->id)->get();
        return view('perlengkapan.index',['perlengkapan' => $perlengkapan]);
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
            'namaalat' => 'required',
            'jumlah' => 'required|numeric',
            'tipe' => 'required',
            'spesifikasi' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'dokumen' =>'required|max:1024|mimes:jpeg,png,pdf',
        ]);

        $perlengkapan = new perlengkapan();
        $perlengkapan->id_user = Auth::user()->id;
        $perlengkapan->namaalat =  $request->namaalat;
        $perlengkapan->jumlah =  $request->jumlah;
        $perlengkapan->tipe =  $request->tipe;
        $perlengkapan->spesifikasi =  $request->spesifikasi;
        $perlengkapan->status =  $request->status;
        $perlengkapan->kondisi =  $request->kondisi;
        if ($request->hasFile('dokumen')) {
           
            $image = $request->file('dokumen');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/fileperlengkapan';
            $image->storeAs($folder, $filename);
            $perlengkapan->dokumen = $filename;
        }
        $perlengkapan->save();
        return redirect()->route('perlengkapan.index')->with('status','berhasil disimpan');
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
        $perlengkapan = perlengkapan::findOrfail($id);
        if ($perlengkapan->dokumen && Storage::exists($perlengkapan->dokumen)) {
            Storage::delete($perlengkapan->dokumen);
        }
        $perlengkapan->delete();
        return redirect()->route('perlengkapan.index')->with('Status','Data berhasil dihapus');
    }
}
