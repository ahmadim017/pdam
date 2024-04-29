<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class slideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = slide::all();
        return view('slide.index',['slide' => $slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'file|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $slide = new slide();
        $slide->keterangan = $request->input('keterangan');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/slide/image/', $fileName);
            $slide->image = $fileName;
        }
        
        $slide->save();
        return redirect()->route('slide.index')->with('status', 'Data Berhasil disimpan.');
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
        $slide = slide::findOrfail($id);
        return view('slide.edit',['slide' => $slide]);
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
        $validatedData = $request->validate([
            'image' => 'file|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $slide = slide::findOrfail($id);
        $slide->keterangan = $request->input('keterangan');
        $slide->status = $request->input('status');
        if ($request->hasFile('image')) {
            if ( $slide->image && file_exists(storage_path('app/public/slide/image/' . $slide->image))) {
                Storage::delete('public/slide/image/' . $slide->image);
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/slide/image/', $fileName);
            $slide->image = $fileName;
        }
        
        $slide->save();
        return redirect()->route('slide.index')->with('status', 'Data Berhasil diupdate.');
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
