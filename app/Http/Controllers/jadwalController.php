<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;

class jadwalController extends Controller
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
            'jadwal.*.id_paket' => 'required',
            'jadwal.*.kegiatan' => 'required',
            'jadwal.*.tglpelaksanaan' => 'required|date',
            'jadwal.*.waktumulai' => 'required',
            'jadwal.*.waktuselesai' => 'required|after:waktumulai',
        ], [
            'jadwal.*.waktuselesai.after' => 'Waktu selesai harus setelah waktu mulai.',
        ]);
    
        if ($request->has('jadwal')) {
            foreach ($request->jadwal as $data) {
                if (isset($data['id_paket'], $data['kegiatan'], $data['tglpelaksanaan'], $data['waktumulai'], $data['waktuselesai'])) {
                    // Cek apakah data jadwal sudah ada berdasarkan id_paket dan kegiatan
                    $jadwal = Jadwal::where('id_paket', $data['id_paket'])
                                    ->where('kegiatan', $data['kegiatan'])
                                    ->first();
    
                    // Jika data jadwal sudah ada, update data tersebut
                    if ($jadwal) {
                        $jadwal->update([
                            'tglpelaksanaan' => $data['tglpelaksanaan'],
                            'waktumulai' => $data['waktumulai'],
                            'waktuselesai' => $data['waktuselesai'],
                        ]);
                    } else {
                        // Jika data jadwal belum ada, buat data baru
                        Jadwal::create([
                            'id_paket' => $data['id_paket'],
                            'kegiatan' => $data['kegiatan'],
                            'tglpelaksanaan' => $data['tglpelaksanaan'],
                            'waktumulai' => $data['waktumulai'],
                            'waktuselesai' => $data['waktuselesai'],
                        ]);
                    }
                }
            }
        }
    
        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('status', 'Data jadwal kegiatan berhasil disimpan.');
    
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
        //
    }
}
