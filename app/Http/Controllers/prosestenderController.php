<?php

namespace App\Http\Controllers;

use App\Models\doklainnya;
use App\Models\jadwal;
use App\Models\jawaban;
use App\Models\kak;
use App\Models\penjelasan;
use App\Models\prosestender;
use App\Models\rancangankontrak;
use App\Models\uraianpekerjaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class prosestenderController extends Controller
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
        $prosestender = new prosestender();
        $prosestender->id_user = Auth::user()->id;
        $prosestender->id_paket = $request->id_paket;
        $prosestender->save();
        return redirect()->route('prosestender.show',[$prosestender->id])->with('status','Berhasil mengikuti paket tender');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prosestender = prosestender::findOrfail($id);
        $kak = kak::where('id_paket',$prosestender->id_paket)->get();
        $rancangankontrak = rancangankontrak::where('id_paket',$prosestender->id_paket)->get();
        $uraianpekerjaan = uraianpekerjaan::where('id_paket',$prosestender->id_paket)->get();
        $doklainnya = doklainnya::where('id_paket',$prosestender->id_paket)->get();
        $jadwal = jadwal::all();
        return view('prosestender.show',[
            'prosestender' => $prosestender,
            'jadwal' => $jadwal,
            'kak' => $kak,
            'rancangankontrak'  => $rancangankontrak,
            'uraianpekerjaan' => $uraianpekerjaan,
            'doklainnya' => $doklainnya,
        ]);
    }

    public function penjelasan($id)
    {
        Date::setLocale('id');
        $prosestender = prosestender::findOrFail($id);
        $jadwal = jadwal::where('id_paket', $prosestender->id_paket)->get();
        $penjelasan = penjelasan::where('id_paket', $prosestender->id_paket)->get();
        $jawaban = jawaban::where('id_paket', $prosestender->id_paket)->get();
        $sisawaktu = null;
        $now = Carbon::now()->timezone('Asia/Makassar');
        $tanggal_sekarang = Carbon::now()->toDateString();
        $jamSekarang = $now->hour;
        //dd($jamSekarang);
        foreach ($jadwal as $a) {

            if ($a->kegiatan == 'BA Penjelasan Aanwizing' &&  $a->tglpelaksanaan == $tanggal_sekarang) {
                // Konversi waktu mulai dan waktu selesai jadwal ke dalam format jam
                $waktuMulai = \Carbon\Carbon::parse($a->tglpelaksanaan . ' ' . $a->waktumulai)->hour;
                $waktuSelesai = \Carbon\Carbon::parse($a->tglpelaksanaan . ' ' . $a->waktuselesai)->hour;

                // Hitung sisa waktu dalam jam
                $sisawaktu = $waktuSelesai - $jamSekarang;

                // Jika waktu selesai sudah lewat hari ini, tambahkan 24 jam
                if ($jamSekarang >= $waktuSelesai) {
                    $sisawaktu = 0;
                }
                
                break; // Keluar dari loop setelah menemukan jadwal yang sesuai
            }
        }
    //dd($now);
    return view('prosestender.penjelasan', compact('prosestender', 'jadwal','sisawaktu','penjelasan','jawaban'));
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
        $prosestender = prosestender::findOrfail($id);
        $request->validate([
            'filepenawaran' => $prosestender->filepenawaran ? 'file|max:50000|mimes:doc,pdf,rar,zip,jpeg,png,zip,xls,docx' : 'required|file|max:50000|mimes:doc,pdf,rar,zip,jpeg,png,zip,xls,docx',
            'hargapenawaran' => 'required',
        ]);

       
        $prosestender->filepenawaran = $request->filepenawarant;
        $prosestender->tglpenawaran = Carbon::now()->format('Y-m-d');
        $prosestender->nosuratpenawaran = $request->nosuratpenawaran;
        $prosestender->tglsuratpenawaran = $request->tglsuratpenawaran;
        $prosestender->hargapenawaran = str_replace('.', '', $request->hargapenawaran);
       // Periksa apakah ada file yang diunggah
            if ($request->hasFile('filepenawaran')) {
                $file = $request->file('filepenawaran');
                $extension = $file->getClientOriginalExtension();
                $name_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = $name_file . '_' . time() . '.' . $extension;
                $folder = '/public/dist/filepenawaran';
                
                // Simpan file yang diunggah
                $file->storeAs($folder, $filename);
                
                // Update informasi file
                $prosestender->filepenawaran = $filename;
                $prosestender->name_file = $name_file;
            }
        $prosestender->save();

        return redirect()->back()->with('status','penawaran Berhasil Disimpan');
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
