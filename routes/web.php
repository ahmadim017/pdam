<?php

use App\Http\Controllers\administrasiController;
use App\Http\Controllers\aktependirianController;
use App\Http\Controllers\akteperubahaanController;
use App\Http\Controllers\banegoisasiController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\detailtenderController;
use App\Http\Controllers\doklainnyaController;
use App\Http\Controllers\dokumenlainnyaController;
use App\Http\Controllers\evaluasiteknisController;
use App\Http\Controllers\izinusahaController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kakController;
use App\Http\Controllers\kontrakController;
use App\Http\Controllers\kotakmasukController;
use App\Http\Controllers\nontenderController;
use App\Http\Controllers\pajakController;
use App\Http\Controllers\paketbaruController;
use App\Http\Controllers\paketpekerjaanController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\pengajuanpenyediaController;
use App\Http\Controllers\pengalamanController;
use App\Http\Controllers\pengesahanController;
use App\Http\Controllers\pengurusperusahaanController;
use App\Http\Controllers\penjelasanController;
use App\Http\Controllers\penyediaController;
use App\Http\Controllers\perlengkapanController;
use App\Http\Controllers\prosestenderController;
use App\Http\Controllers\rancangankontrakController;
use App\Http\Controllers\slideController;
use App\Http\Controllers\suratpernyataanController;
use App\Http\Controllers\tenagaahliController;
use App\Http\Controllers\tenderController;
use App\Http\Controllers\uraianpekerjaanController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userdashboardController;
use App\Http\Controllers\welcomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [welcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:ADMIN,VERIFIKATOR'])->name('dashboard');

Route::get('/verifikator', function () {
    return view('verifikator');
})->middleware(['auth', 'role:VERIFIKATOR'])->name('verifikator');

Route::get('/userdashboard', function () {
    return view('userdashboard');
})->middleware(['auth', 'role:USER'])->name('userdashboard');


Route::group(['middleware' => 'auth'], function () {

    route::resource('userdashboard', userdashboardController::class);

    route::resource('suratpernyataan',suratpernyataanController::class);

    route::resource('administrasi', administrasiController::class);

    route::resource('izinusaha',izinusahaController::class);

    route::resource('aktapendirian', aktependirianController::class);

    route::resource('aktaperubahan', akteperubahaanController::class);

    route::resource('pengurusperusahaan', pengurusperusahaanController::class);

    route::resource('pajak', pajakController::class);

    route::resource('dokumenlainnya', dokumenlainnyaController::class);

    route::resource('pengalaman', pengalamanController::class);

    route::resource('tenagaahli', tenagaahliController::class);

    route::resource('perlengkapan', perlengkapanController::class);

    route::resource('pengesahan', pengesahanController::class);

    route::resource('verifikasi', pengajuanpenyediaController::class);

    route::resource('kotakmasuk', kotakmasukController::class);

    route::resource('paketbaru', paketbaruController::class);

    route::resource('prosestender',prosestenderController::class);

    Route::put('nontender/{nontender}', [nontenderController::class, 'update'])->name('nontender.update');

    Route::get('/get-kabupaten/{id}', [administrasiController::class, 'getKabupaten']);

    Route::get('/penjelasan/{id}', [nontenderController::class, 'penjelasan'])->name('paketbaru.penjelasan');

    Route::get('/tender/penjelasan/{id}', [prosestenderController::class, 'penjelasan'])->name('prosestender.penjelasan');

    Route::get('/password',[passwordController::class, 'password'])->name('user.password');

    Route::patch('password',[passwordController::class, 'gantipassword'])->name('user.gantipassword');

    Route::get('/cetak/{id}/undangan', [kotakmasukController::class, 'cetak'])->name('undangan.cetak');

    route::get('dashboards', [dashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/perbaikan',[pengajuanpenyediaController::class, 'perbaikan'])->name('verifikasi.perbaikan');

    Route::post('/perubahan/simpan',[pengajuanpenyediaController::class, 'simpan'])->name('perubahan.simpan');

    Route::post('/pertanyaan',[penjelasanController::class, 'store'])->name('pertanyaan.store');

    Route::get('/dataperuhsaan', function(){
        return view('dataperusahaan.index');
    })->name('dataperusahaan');

    Route::get('/paketbaru', function(){
        return view('paketbaru.index');
    })->name('paketbaru.index');
});





Route::middleware(['auth', 'role:VERIFIKATOR,ADMIN'])->group(function () {

    Route::resource('slide', slideController::class);
    route::resource('user', userController::class)->only(['index', 'create', 'store', 'destroy','edit','update']);
    route::get('/daftar/user', [userController::class, 'daftar'])->name('user.daftar');


    Route::resource('penyedia', penyediaController::class);
    Route::get('/perubahan/penyedia/', [penyediaController::class,'perubahan'])->name('penyedia.perubahan');
    Route::post('/terima/penyedia/{id}', [pengajuanpenyediaController::class, 'terima'])->name('penyedia.terima');
    route::resource('pengadaan', paketpekerjaanController::class);
    route::resource('jadwal', jadwalController::class);
    route::resource('nontender', nontenderController::class)->only(['index', 'create', 'store', 'destroy']);
    route::resource('kak', kakController::class);
    route::resource('rancangankontrak', rancangankontrakController::class);
    route::resource('uraianpekerjaan', uraianpekerjaanController::class);
    route::resource('doklainnya', doklainnyaController::class);
    route::resource('kontrak',kontrakController::class);
   
    //tender
    
    route::resource('tender', tenderController::class);
    route::resource('detailtender', detailtenderController::class);
    Route::post('/tender/baaanwizing/{id}', [detailtenderController::class,'baaanwizing'])->name('detailtender.baaanwizing');
    Route::post('/tender/bukapenawaran/{id}', [detailtenderController::class,'pembukaanpenawaran'])->name('detailtender.pembukaanpenawaran');
    Route::post('/tender/baevaluasi/{id}', [detailtenderController::class,'baevaluasi'])->name('detailtender.baevaluasi');
    Route::post('/tender/banegoisasi/{id}', [detailtenderController::class,'banegoisasi'])->name('detailtender.banegoisasi');
    Route::post('/tender/baklarifikasi/{id}', [detailtenderController::class,'baklarifikasi'])->name('detailtender.baklarifikasi');
    Route::post('/tender/bapengumumanpemenang/{id}', [detailtenderController::class,'bapengumumanpemenang'])->name('detailtender.bapengumumanpemenang');
    Route::get('/tender/detailpenyedia/{id}', [detailtenderController::class,'detailpenyedia'])->name('detailtender.detailpenyedia');
    route::get('/tender/jadwal/{id}',[tenderController::class,'buat'])->name('jadwaltender.buat');
    route::get('/tender/view/jadwal/{id}',[tenderController::class,'view'])->name('jadwaltender.view');
    Route::get('/tender/aanwizing/{id}',[tenderController::class,'aanwizing'])->name('tender.aanwizing');
    Route::get('/tender/evaluasi/{id}',[tenderController::class,'evaluasi'])->name('tender.evaluasi');
    Route::get('/tender/pembukaanpenawaran/{id}',[tenderController::class,'pembukaan'])->name('tender.pembukaan');
    Route::get('/tender/penawaran/{id}',[tenderController::class,'penawaran'])->name('tender.penawaran');
    Route::get('/tender/negoisasi/{id}',[tenderController::class,'negoisasi'])->name('tender.negoisasi');
    Route::get('/tender/pengumumanpemenang/{id}',[tenderController::class,'pengumumanpemenang'])->name('tender.pengumumanpemenang');
    Route::get('/tender/klarifikasi/{id}',[tenderController::class,'klarifikasi'])->name('tender.klarifikasi');
    Route::post('/tender/sendemail/{id_prosestender}', [tenderController::class, 'sendemail'])->name('tender.sendemail');
    Route::get('/tender/undangan/{id}/cetak', [tenderController::class, 'cetak'])->name('tender.cetak');
    Route::get('/tender/baaanwizing/{id}/cetak', [tenderController::class, 'baaanwizing'])->name('tender.baaanwizing');
    Route::get('/tender/bapembukaanpenawaran/{id}/cetak',[tenderController::class,'bapembukaan'])->name('tender.bapembukaan');
    Route::get('/tender/baevaluasi/{id}/cetak',[tenderController::class,'baevaluasi'])->name('tender.baevaluasi');
    Route::get('/tender/baklarifikasi/{id}/cetak',[tenderController::class,'baklarifikasi'])->name('tender.baklarifikasi');
    Route::get('/tender/banegoisasi/{id}/cetak',[tenderController::class,'banegoisasi'])->name('tender.banegoisasi');
    Route::get('/tender/bapengumumanpemenang/{id}/cetak',[tenderController::class,'bapengumumanpemenang'])->name('tender.bapengumumanpemenang');

    Route::post('/evaluasipenelitian/simpan/',[evaluasiteknisController::class,'evaluasipenelitian'])->name('evaluasipenelitian.simpan');
    Route::post('/evaluasiteknis/simpan/',[evaluasiteknisController::class,'evaluasiteknis'])->name('evaluasiteknis.simpan');
    Route::post('/evaluasibiaya/simpan/',[evaluasiteknisController::class,'evaluasibiaya'])->name('evaluasibiaya.simpan');
    Route::post('/evaluasiakhir/simpan/',[evaluasiteknisController::class,'evaluasiakhir'])->name('evaluasiakhir.simpan');
    Route::post('/banegoisasi/simpan',[banegoisasiController::class,'simpan'])->name('banegoisasi.simpan');
   // route::post('/pengadaan/penyedia/{id}',[paketpekerjaanController::class,'hapus'])->name('penyedia.hapus');
    route::get('/pengadaan/jadwal/{id}',[paketpekerjaanController::class,'buat'])->name('jadwal.buat');
    route::get('/pengadaan/belumadajadwal/{id}',[paketpekerjaanController::class,'view'])->name('jadwal.view');
    route::get('/pengadaan/penyedia/{id}',[paketpekerjaanController::class,'daftarpenyedia'])->name('penyedia.daftar');
    route::get('/pengadaan/evaluasi/{id}',[paketpekerjaanController::class,'evaluasi'])->name('pengadaan.evaluasi');
    route::get('/pengadaan/kontrak/{id}',[paketpekerjaanController::class,'kontrak'])->name('pengadaan.kontrak');
    Route::get('/undangan/{id}/cetak', [nontenderController::class, 'cetak'])->name('nontender.cetak');
    Route::post('/nontender/{id}/evaluasi', [nontenderController::class, 'evaluasi'])->name('nontender.evaluasi');
    Route::get('/pengadaan/aanwizing/{id}',[paketpekerjaanController::class,'aanwizing'])->name('pengadaan.aanwizing');
    Route::post('/nontender/jawab', [nontenderController::class, 'jawab'])->name('nontender.jawab');
    Route::put('/pengadaan/aanwizing/{id}', [paketpekerjaanController::class,'baaanwizing'])->name('baaanwizing.simpan');
    Route::get('/baaanwizing/{id}/cetak', [nontenderController::class, 'baaanwizing'])->name('baaanwizing.cetak');
    Route::get('/kontrak/{id}/cetak', [kontrakController::class, 'cetak'])->name('kontrak.cetak');
    
});

require __DIR__.'/auth.php';
