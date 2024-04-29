<?php

namespace App\Http\Controllers;

use App\Models\dokumenlainnya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dokumenlainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumenlainnya = dokumenlainnya::where('id_user', Auth::user()->id)->get();
        return view('dokumenlainnya.index',['dokumenlainnya' => $dokumenlainnya]);
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
            'namadokumen' => 'required',
            'filedokumen' =>'required|max:1024|mimes:jpeg,png,pdf',
        ]);

        $dokumenlainnya = new dokumenlainnya();
        $dokumenlainnya->id_user = Auth::user()->id;
        $dokumenlainnya->nomordokumen =  $request->nomordokumen;
        $dokumenlainnya->namadokumen = $request->namadokumen;
        if ($request->hasFile('filedokumen')) {
           
            $image = $request->file('filedokumen');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filedokumenlainnya';
            $image->storeAs($folder, $filename);
            $dokumenlainnya->filedokumen = $filename;
        }
        $dokumenlainnya->save();
        return redirect()->route('dokumenlainnya.index')->with('status','berhasil disimpan');
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
        $dokumenlainnya = dokumenlainnya::findOrfail($id);
        if ($dokumenlainnya->filedokumen && Storage::exists($dokumenlainnya->filedokumen)) {
            Storage::delete($dokumenlainnya->filedokumen);
        }
        $dokumenlainnya->delete();
        return redirect()->route('dokumenlainnya.index')->with('Status','Data berhasil dihapus');
    }
}
