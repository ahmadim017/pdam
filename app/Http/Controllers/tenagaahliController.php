<?php

namespace App\Http\Controllers;

use App\Models\tenagaahli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class tenagaahliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenagaahli = tenagaahli::where('id_user',Auth::user()->id)->get();
        return view('tenagaahli.index',['tenagaahli' => $tenagaahli]);
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
            'nama' => 'required',
            'tgllahir' => 'required',
            'jeniskelamin' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
            'pengalamankerja' => 'required',
            'status' => 'required',
            'dokumen' =>'required|max:1024|mimes:jpeg,png,pdf',
        ]);

        $tenagaahli = new tenagaahli();
        $tenagaahli->id_user = Auth::user()->id;
        $tenagaahli->nama =  $request->nama;
        $tenagaahli->tgllahir =  $request->tgllahir;
        $tenagaahli->pendidikan =  $request->pendidikan;
        $tenagaahli->jeniskelamin =  $request->jeniskelamin;
        $tenagaahli->alamat =  $request->alamat;
        $tenagaahli->tgllahir =  $request->tgllahir;
        $tenagaahli->jabatan = $request->jabatan;
        $tenagaahli->pengalamankerja =  $request->pengalamankerja;
        $tenagaahli->keahlian =  $request->keahlian;
        $tenagaahli->status =  $request->status;
        if ($request->hasFile('dokumen')) {
           
            $image = $request->file('dokumen');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $folder = '/public/dist/filetenagaahli';
            $image->storeAs($folder, $filename);
            $tenagaahli->dokumen = $filename;
        }
        $tenagaahli->save();
        return redirect()->route('tenagaahli.index')->with('status','berhasil disimpan');
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
        $tenagaahli = tenagaahli::findOrfail($id);
        if ($tenagaahli->dokumen && Storage::exists($tenagaahli->dokumen)) {
            Storage::delete($tenagaahli->dokumen);
        }
        $tenagaahli->delete();
        return redirect()->route('tenagaahli.index')->with('Status','Data berhasil dihapus');
    }
}
