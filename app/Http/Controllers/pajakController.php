<?php

namespace App\Http\Controllers;

use App\Models\pajak;
use App\Models\pengajuanpenyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pajak = pajak::where('id_user', Auth::user()->id)->get();
        $pengajuanpenyedia = pengajuanpenyedia::where('id_user', Auth::user()->id)->first();
        return view('pajak.index',['pajak' => $pajak,'pengajuanpenyedia' => $pengajuanpenyedia]);
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
            'jenispajak' => 'required',
            'nomorbuktipajak' => 'required',
            'tanggalbukti' => 'required',
            'file' =>'required|max:1024|mimes:jpeg,png,pdf',
        ]);

        $pajak = new pajak();
        $pajak->id_user = Auth::user()->id;
        $pajak->jenispajak =  $request->jenispajak;
        $pajak->nomorbuktipajak = $request->nomorbuktipajak;
        $pajak->tanggalbukti = $request->tanggalbukti;
        $pajak->keterangan = $request->keterangan;
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filepajak';
            $image->storeAs($folder, $filename);
            $pajak->file = $filename;
        }
        $pajak->save();
        return redirect()->route('pajak.index')->with('status','berhasil disimpan');
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
        $pajak = pajak::findOrfail($id);
        if ($pajak->file && Storage::exists($pajak->file)) {
            Storage::delete($pajak->file);
        }
        $pajak->delete();
        return redirect()->route('pajak.index')->with('Status','Data berhasil dihapus');
    }
}
