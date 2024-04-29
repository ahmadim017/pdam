<?php

namespace App\Http\Controllers;

use App\Models\kontrak;
use App\Models\nontender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use PhpOffice\PhpWord\TemplateProcessor;

class kontrakController extends Controller
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

    public function cetak($id)
{
    Date::setLocale('id');
    $data = nontender::findOrfail($id);
    $datas = kontrak::where('id_paket', $data->id_paket)->first();
    // Jika data tidak ditemukan, kembalikan response
    if (!$data) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    // Lokasi template dan output
    $templatePath = public_path('word/kontrak.docx');
    $outputPath = storage_path('app/output/kontrak_filled_'.$id.'.docx');

    // Buat objek TemplateProcessor
    $templateProcessor = new TemplateProcessor($templatePath);
   
    // Gantikan placeholder dengan data dari database
    $templateProcessor->setValue('nosurat', $datas->nosurat);
    $templateProcessor->setValue('tglsurat', \Carbon\Carbon::createFromFormat('Y-m-d', $datas->tglsurat)->format('j F Y'));
    $templateProcessor->setValue('nilaikontrak', 'Rp.' . number_format($datas->nilaikontrak, 0, ',', '.'));
    $templateProcessor->setValue('nama_perusahaan', $data->user->name);
    $templateProcessor->setValue('npwp', $data->user->npwp);
    $templateProcessor->setValue('namapaket', $data->paketpekerjaan->namapaket);
    $templateProcessor->setValue('tahunanggaran', $data->paketpekerjaan->tahunanggaran);
    $templateProcessor->setValue('waktupelaksanaan', $data->paketpekerjaan->waktupelaksanaan);
    $templateProcessor->setValue('lokasi', $data->paketpekerjaan->lokasi);
    $templateProcessor->setValue('alamat', $data->user->administrasi->alamat);
    $templateProcessor->setValue('namadirektur', $data->user->administrasi->namadirektur);
    $templateProcessor->setValue('badanusaha', $data->user->administrasi->badanusaha->nama);
    $templateProcessor->setValue('kabupaten', $data->user->administrasi->kabupaten->name);
    $templateProcessor->setValue('provinsi', $data->user->administrasi->provinsi->name);
    // ... (dan seterusnya sesuai dengan kolom-kolom yang Anda miliki)

    // Simpan dokumen yang sudah diisi
    $templateProcessor->saveAs($outputPath);

    // Unduh dokumen
    return response()->download($outputPath)->deleteFileAfterSend(true);
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
            'tglsurat' => 'required',
            'nosurat' => 'required',
            'nilaikontrak' => 'required',
        ], $messages = [
            'required' => 'Pastikan isian tidak kosong',
        ]);

        $kontrak = kontrak::updateOrCreate(
            ['id_paket' => $request->id_paket], // Kriteria pencarian
            [
                'id_user' => $request->id_user,
                'nilaikontrak' => str_replace('.', '', $request->nilaikontrak),
                'nosurat' => $request->nosurat,
                'tglsurat' => $request->tglsurat, 
            ]
        );

        
        return redirect()->back()->with('status','Berhasil Membuat Kontrak');
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
