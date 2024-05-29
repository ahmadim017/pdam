<?php

namespace App\Http\Controllers;

use App\Models\penjelasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class penjelasanController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'uraian' => 'required',
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $penjelasan = new penjelasan();
        $penjelasan->dokumen = $request->dokumen;
        $penjelasan->bab = $request->bab;
        $penjelasan->uraian = $request->uraian;
        $penjelasan->id_user = Auth::user()->id;
        $penjelasan->id_paket = $request->id_paket;
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $name_file = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename =  $name_file . '_' . time() . "." . $extension; 
            $folder = '/public/dist/filepertanyaan';
            $image->storeAs($folder, $filename);
            $penjelasan->file = $filename;
        } else {
            // Jika tidak ada file yang diunggah, atur nilai file menjadi null atau nilai default yang sesuai
            $penjelasan->file = null; // Atau atur ke nilai default yang sesuai
        }

        $penjelasan->save();

        return redirect()->back()->with('status','Berhasil Mengirim Pertanyaan!');
    }
}
