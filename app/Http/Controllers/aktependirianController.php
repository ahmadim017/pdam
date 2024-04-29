<?php

namespace App\Http\Controllers;

use App\Models\aktapendirian;
use App\Models\aktaperubahan;
use App\Models\pengesahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class aktependirianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akteperubahan = aktaperubahan::where('id_user', Auth::user()->id)->get();
        $aktapendirian = aktapendirian::where('id_user', Auth::user()->id)->get();
        $pengesahan = pengesahan::where('id_user', Auth::user()->id)->get();
        return view('aktapendirian.index',['aktapendirian' => $aktapendirian,'akteperubahan' => $akteperubahan,'pengesahan' => $pengesahan]);
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
            'lokasi' => 'required',
            'file' =>'required|max:2mb|mimes:jpeg,png,pdf',
            'modal' => 'required',
        ]);

        $aktependirian = new aktapendirian();
        $aktependirian->id_user = Auth::user()->id;
        $aktependirian->nomor =  $request->nomor;
        $aktependirian->tglsurat = $request->tglsurat;
        $aktependirian->notaris = $request->notaris;
        $aktependirian->lokasi = $request->lokasi;
        $aktependirian->modal = str_replace('.', '', $request->modal);
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/fileaktependirian';
            $image->storeAs($folder, $filename);
            $aktependirian->file = $filename;
        }
        $aktependirian->save();
        return redirect()->route('aktapendirian.index')->with('status','berhasil menambahkan akta pendirian');
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
        $aktependirian = aktapendirian::findOrfail($id);
        if ( $aktependirian->file && Storage::exists( $aktependirian->file)) {
            Storage::delete( $aktependirian->file);
        }
        $aktependirian->delete();
        return redirect()->route('aktapendirian.index')->with('Status','Data berhasil dihapus');
    }
}
