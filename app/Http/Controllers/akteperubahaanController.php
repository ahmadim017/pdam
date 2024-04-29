<?php

namespace App\Http\Controllers;

use App\Models\aktaperubahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class akteperubahaanController extends Controller
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
            'nomor' => 'required',
            'tglsurat' => 'required',
            'notaris' => 'required',
            'dokumen' =>'required|max:2mb|mimes:jpeg,png,pdf',
        ]);

        $aktaperubahan = new aktaperubahan();
        $aktaperubahan->id_user = Auth::user()->id;
        $aktaperubahan->nomor =  $request->nomor;
        $aktaperubahan->tglsurat = $request->tglsurat;
        $aktaperubahan->notaris = $request->notaris;
        if ($request->hasFile('dokumen')) {
           
            $image = $request->file('dokumen');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/fileakteperubahan';
            $image->storeAs($folder, $filename);
            $aktaperubahan->dokumen = $filename;
        }
        $aktaperubahan->save();
        return redirect()->route('aktapendirian.index')->with('status','berhasil menambahkan akta perubahan');
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
        $aktaperubahan = aktaperubahan::findOrfail($id);
        if ($aktaperubahan->dokumen && Storage::exists($aktaperubahan->dokumen)) {
            Storage::delete($aktaperubahan->dokumen);
        }
        $aktaperubahan->delete();
        return redirect()->route('aktapendirian.index')->with('Status','Data berhasil dihapus');
    }
}
