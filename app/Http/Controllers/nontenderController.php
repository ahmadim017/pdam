<?php

namespace App\Http\Controllers;

use App\Jobs\SendUndanganEmail;
use App\Models\jadwal;
use App\Models\jawaban;
use App\Models\kotakmasuk;
use App\Models\nontender;
use App\Models\penjelasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Jenssegers\Date\Date;
class nontenderController extends Controller
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
            'id_user' => 'required',
            'nosurat' => 'required',
            'metodepengadaan' => 'required',
        ], [
            'required' => 'Pastikan isian tidak kosong',
        ]);
    
        // Mulai transaksi
        DB::beginTransaction();
    
        try {
            // Update or create untuk nontender
            $nontender = nontender::updateOrCreate(
                ['id_paket' => $request->id_paket],
                [
                    'id_user' => $request->id_user,
                    'nosurat' => $request->nosurat,
                    'tglsurat' => $request->tglsurat,
                    'metodepengadaan' => $request->metodepengadaan,
                    'created_by' => Auth::user()->id,
                ]
            );
    
            // Update or create untuk kotakmasuk
            kotakmasuk::updateOrCreate(
                ['id_paket' => $request->id_paket],
                [
                    'judul' => 'undangan',
                    'id_paket' => $request->id_paket,
                    'id_user' => $request->id_user,
                    'tanggal' => $request->tglsurat,
                ]
            );
    
            // Mengambil email dari user yang sesuai
            $email = User::findOrFail($request->id_user)->email;
            $jadwal = jadwal::all();
    
            // Mengirim email dengan ID undangan
            SendUndanganEmail::dispatch($email, $nontender->id, $jadwal);
    
            // Commit transaksi jika semuanya berhasil
            DB::commit();
    
            return redirect()->route('pengadaan.index')->with('status', 'Berhasil Membuat Paket');
    
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
    
            // Log error untuk debugging
            Log::error('Error saat menyimpan data atau mengirim email: ' . $e->getMessage());
    
            return redirect()->route('pengadaan.index')->with('status', 'Terjadi kesalahan saat menyimpan data atau mengirim email.');
        }
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
       
        
        $nontender = nontender::findOrfail($id);

        $request->validate([
            'filepenawaran' => $nontender->filepenawaran ? 'file|max:50000|mimes:doc,pdf,rar,zip,jpeg,png,zip,xls,docx' : 'required|file|max:50000|mimes:doc,pdf,rar,zip,jpeg,png,zip,xls,docx',
            'nosuratpenawaran' => 'required',
            'tglsuratpenawaran' => 'required',
        ]);
        
        $nontender->nosuratpenawaran = $request->nosuratpenawaran;
        $nontender->tglsuratpenawaran = $request->tglsuratpenawaran;
        $nontender->hargapenawaran = str_replace('.', '', $request->hargapenawaran);
        if ($request->hasFile('filepenawaran')) {
           
            $image = $request->file('filepenawaran');
            $extension = $image->getClientOriginalExtension();
            $name_file = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename =  $name_file . '_' . time() . "." . $extension; 
            $folder = '/public/dist/filepenawaran';
            $image->storeAs($folder, $filename);
            $nontender->filepenawaran = $filename;
            $nontender->name_file =  $name_file;
        }
        $nontender->save();
        return redirect()->back()->with('status','Anda Berhasil Memasukkan Penawaran');

    }

    public function evaluasi(Request $request, $id)
    {
        $nontender = nontender::findOrfail($id);
        $nontender->baaritmatik = $request->baaritmatik;
        $nontender->tglaritmatik = $request->tglaritmatik;
        $nontender->status = 'Diterima';
        $nontender->save();
        return redirect()->back()->with('status','Proses Evaluasi Berhasil');

    }

    public function jawab(Request $request)
    {
        $jawaban = new jawaban();
        $jawaban->id_penjelasan = $request->id_penjelasan;
        $jawaban->id_paket = $request->id_paket;
        $jawaban->verifikator = Auth::user()->id;
        $jawaban->jawaban = $request->jawaban;
        if ($request->hasFile('file')) {
           
            $image = $request->file('file');
            $extension = $image->getClientOriginalExtension();
            $name_file = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $filename =  $name_file . '_' . time() . "." . $extension; 
            $folder = '/public/dist/filejawaban';
            $image->storeAs($folder, $filename);
            $jawaban->file = $filename;
        } else {
            // Jika tidak ada file yang diunggah, atur nilai file menjadi null atau nilai default yang sesuai
            $jawaban->file = null; // Atau atur ke nilai default yang sesuai
        }
        $jawaban->save();
       
        return redirect()->back()->with('status','Pertanyaan Berhasil dijawab');

    }

    public function penjelasan($id)
    {
        Date::setLocale('id');
        $nontender = nontender::findOrFail($id);
        $jadwal = jadwal::where('id_paket', $nontender->id_paket)->get();
        $penjelasan = penjelasan::where('id_paket', $nontender->id_paket)->get();
        $jawaban = jawaban::where('id_paket', $nontender->id_paket)->get();
        $sisawaktu = null;
        $now = \Carbon\Carbon::now()->timezone('Asia/Makassar');
        $tanggal_sekarang = Carbon::now()->toDateString();
        $jamSekarang = $now->hour;
        //dd($jamSekarang);
        foreach ($jadwal as $a) {

            if ($a->kegiatan == 'Penjelasan Pekerjaan' &&  $a->tglpelaksanaan == $tanggal_sekarang) {
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
    return view('paketbaru.penjelasan', compact('nontender', 'jadwal','sisawaktu','penjelasan','jawaban'));
    }

    public function cetak($id)
    {
        Date::setlocale('id');
        $nontender = nontender::where('id_paket',$id)->first();
        $jadwal = jadwal::where('id_paket', $nontender->id_paket)->get();
        $pdf = PDF::loadview('kotakmasuk.undangan',['nontender' => $nontender, 'jadwal'=>$jadwal]);
        return $pdf->stream();
    }

    public function baaanwizing($id)
    {
        Date::setlocale('id');
        $nontender = nontender::where('id_paket',$id)->first();
        $penjelasan = penjelasan::where('id_paket',$id)->get();
        $jawaban = jawaban::where('id_paket',$id)->get();
        $pdf = PDF::loadview('pengadaan.baaanwizing',['nontender' => $nontender,'penjelasan' => $penjelasan, 'jawaban' => $jawaban]);
        return $pdf->stream();
    }

    public function aritmatik($id)
    {
        Date::setlocale('id');
        $nontender = nontender::where('id_paket',$id)->first();
        //dd($nontender);
        $pdf = PDF::loadview('pengadaan.aritmatik',['nontender' => $nontender]);
        return $pdf->stream();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nontender = nontender::findOrFail($id);
        $nontender->delete();
        return redirect()->route('penyedia.daftar',[$nontender->id_paket])->with('Status', 'berhasil menghapus Penyedia');

    }
}
