<?php

namespace App\Http\Controllers;

use App\Models\pengesahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pengesahanController extends Controller
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
            'file' =>'required|max:2048|mimes:jpeg,png,pdf',
        ]);

        $pengesahan = new pengesahan();
        $pengesahan->id_user = Auth::user()->id;
        $pengesahan->nomor =  $request->nomor;
        $pengesahan->tglsurat = $request->tglsurat;
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filepengesahan';
            $image->storeAs($folder, $filename);
            $pengesahan->file = $filename;
        }
        $pengesahan->save();
        return redirect()->route('aktapendirian.index')->with('status','berhasil menambahkan Pengesahan Kemenkumham');
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
        $pengesahan = pengesahan::findOrfail($id);
        if ($pengesahan->file && Storage::exists($pengesahan->file)) {
            Storage::delete($pengesahan->file);
        }
        $pengesahan->delete();
        return redirect()->route('aktapendirian.index')->with('Status','Data berhasil dihapus');
    }
}
