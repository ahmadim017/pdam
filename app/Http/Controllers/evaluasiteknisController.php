<?php

namespace App\Http\Controllers;

use App\Models\evaluasiakhir;
use App\Models\evaluasibiaya;
use App\Models\evaluasipenelitian;
use App\Models\persyaratanevaluasiteknis;
use App\Models\prosestender;
use Illuminate\Http\Request;

class evaluasiteknisController extends Controller
{
    public function evaluasipenelitian(Request $request)
    {
        // Retrieve all the input data
        $input = $request->all();

        // Assuming $prosestender, $id_paket, and $id_user are available here
        $id_paket = $request->id_paket; // Get this from the request
        $id_user = $request->id_user;  // Get this from the request

        // Loop through the inputs to save to database
        foreach ($input as $key => $value) {
            if (strpos($key, 'persyaratan_') === 0) {
                $id_persyaratan = str_replace('persyaratan_', '', $key);

                EvaluasiPenelitian::updateOrCreate(
                    [
                        'id_paket' => $id_paket,
                        'id_user' => $id_user,
                        'id_persyaratankualifikasi' => $id_persyaratan,
                    ],
                    [
                        'status' => $value,
                    ]
                );
            }
        }

        return redirect()->back()->with('status', 'Evaluasi Penelitian berhasil disimpan!');
    }

    public function evaluasiteknis(Request $request)
{
    // Retrieve all the input data
    $input = $request->all();

    // Get id_paket and id_user from the request
    $id_paket = $request->id_paket;
    $id_user = $request->id_user;

    // Get all existing evaluasiteknis IDs for this user and package
    $existingPersyaratanIds = persyaratanevaluasiteknis::where('id_paket', $id_paket)
        ->where('id_user', $id_user)
        ->pluck('id_evaluasiteknis')
        ->toArray();

    // Track persyaratan IDs from the input
    $inputPersyaratanIds = [];

    // Loop through the inputs to save to database
    foreach ($input as $key => $value) {
        if (strpos($key, 'persyaratan_') === 0) {
            $id_persyaratan = str_replace('persyaratan_', '', $key);
            $inputPersyaratanIds[] = $id_persyaratan;

            // Get the corresponding bobot value
            $bobotKey = 'bobot_' . $id_persyaratan;
            $bobot = isset($input[$bobotKey]) ? $input[$bobotKey] : 0;

            // Set bobot to 0 if the status is "tidak"
            if ($value === 'tidak') {
                $bobot = 0;
            }

            // Use updateOrCreate to update or create the record in the database
            persyaratanevaluasiteknis::updateOrCreate(
                [
                    'id_paket' => $id_paket,
                    'id_user' => $id_user,
                    'id_evaluasiteknis' => $id_persyaratan,
                ],
                [
                    'bobot' => $bobot,
                    'status' => $value,
                ]
            );
        }
    }

    // Determine which persyaratan IDs to delete
    $idsToDelete = array_diff($existingPersyaratanIds, $inputPersyaratanIds);

    // Delete the entries that were unchecked
    if (!empty($idsToDelete)) {
        persyaratanevaluasiteknis::where('id_paket', $id_paket)
            ->where('id_user', $id_user)
            ->whereIn('id_evaluasiteknis', $idsToDelete)
            ->delete();
    }

    return redirect()->back()->with('status', 'Evaluasi Teknis berhasil disimpan!');
}
public function evaluasibiaya(Request $request)
{
    $id_user = $request->id_user;
    $id_paket = $request->id_paket;
    $hargapenawaranA = $request->hargaterkoreksi;


    $prosestender = prosestender::where('id_paket', $id_paket)->get();
    $hargaPenawaranTertinggi = 0;

    // Loop melalui harga penawaran untuk menemukan harga penawaran tertinggi
    foreach ($prosestender as $item) {
        $hargaPenawaran = $item->hargapenawaran;
        if ($hargaPenawaran > $hargaPenawaranTertinggi) {
            $hargaPenawaranTertinggi = $hargaPenawaran;
        }
    }

    // Hitung nilai harga relatif berdasarkan perbandingan harga penawaran perusahaan A dengan harga penawaran tertinggi
    if ($hargapenawaranA <= $hargaPenawaranTertinggi) {
        $nilaiharga = ($hargaPenawaranTertinggi / $hargapenawaranA) * 100;
    } else {
        $nilaiharga = ($hargapenawaranA / $hargapenawaranA) * 100; // Jika perusahaan A memiliki harga penawaran tertinggi
    }
    //$hargaB = $prosestenderB->harga_penawaran; 
    //dd($prosestender);
    evaluasibiaya::updateOrCreate(
        [
            'id_user' => $id_user,
            'id_paket' => $id_paket,
        ],
        [
            'hargaterkoreksi' => $hargapenawaranA,
            'nilaiharga' => $nilaiharga,
            'persenhps' => $request->persenhps,
            'status' => $request->status,
        ]
    );

    return redirect()->back()->with('status', 'Evaluasi Biaya berhasil disimpan!');
}

public function evaluasiakhir(Request $request)
{
    
    evaluasiakhir::updateOrCreate(
        [
            'id_user' => $request->id_user,
            'id_paket' => $request->id_paket,
        ],
        [
            'nilaiakhir' => $request->nilaikahir,
            'status' => $request->status,
        ]
    );

    return redirect()->back()->with('status', 'Evaluasi Akhir berhasil disimpan!');
}
}