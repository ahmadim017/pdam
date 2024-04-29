<?php

use App\Http\Controllers\administrasiController;
use App\Http\Controllers\aktependirianController;
use App\Http\Controllers\akteperubahaanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\doklainnyaController;
use App\Http\Controllers\dokumenlainnyaController;
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
use App\Http\Controllers\penyediaController;
use App\Http\Controllers\perlengkapanController;
use App\Http\Controllers\rancangankontrakController;
use App\Http\Controllers\slideController;
use App\Http\Controllers\suratpernyataanController;
use App\Http\Controllers\tenagaahliController;
use App\Http\Controllers\uraianpekerjaanController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userdashboardController;
use App\Models\nontender;
use App\Models\pengajuanpenyedia;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:ADMIN'])->name('dashboard');

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

    route::resource('paketbaru', paketbaruController::class);

    route::resource('kotakmasuk', kotakmasukController::class);

    Route::put('nontender/{nontender}', [nontenderController::class, 'update'])->name('nontender.update');

    Route::get('/get-kabupaten/{id}', [administrasiController::class, 'getKabupaten']);

    Route::get('/password',[passwordController::class, 'password'])->name('user.password');

    Route::patch('password',[passwordController::class, 'gantipassword'])->name('user.gantipassword');

    Route::get('/cetak/{id}/undangan', [kotakmasukController::class, 'cetak'])->name('undangan.cetak');

    route::get('dashboards', [dashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/perbaikan',[pengajuanpenyediaController::class, 'perbaikan'])->name('verifikasi.perbaikan');

    Route::post('/perubahan/simpan',[pengajuanpenyediaController::class, 'simpan'])->name('perubahan.simpan');
});

route::get('/dataperusahaan', function(){
    return view('dataperusahaan.index');
})->middleware(['auth', 'role:USER'])->name('dataperusahaan');


Route::middleware(['auth', 'role:ADMIN'])->group(function () {
   
    Route::resource('slide', slideController::class);
    Route::resource('penyedia', penyediaController::class);
    route::resource('user', userController::class)->only(['index', 'create', 'store', 'destroy','edit','update']);
    route::get('/daftar/user', [userController::class, 'daftar'])->name('user.daftar');
});

Route::middleware(['auth', 'role:VERIFIKATOR'])->group(function () {
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
   // route::post('/pengadaan/penyedia/{id}',[paketpekerjaanController::class,'hapus'])->name('penyedia.hapus');
    route::get('/pengadaan/jadwal/{id}',[paketpekerjaanController::class,'buat'])->name('jadwal.buat');
    route::get('/pengadaan/belumadajadwal/{id}',[paketpekerjaanController::class,'view'])->name('jadwal.view');
    route::get('/pengadaan/penyedia/{id}',[paketpekerjaanController::class,'daftarpenyedia'])->name('penyedia.daftar');
    route::get('/pengadaan/evaluasi/{id}',[paketpekerjaanController::class,'evaluasi'])->name('pengadaan.evaluasi');
    route::get('/pengadaan/kontrak/{id}',[paketpekerjaanController::class,'kontrak'])->name('pengadaan.kontrak');
    Route::get('/undangan/{id}/cetak', [nontenderController::class, 'cetak'])->name('nontender.cetak');
    Route::post('/nontender/{id}/evaluasi', [nontenderController::class, 'evaluasi'])->name('nontender.evaluasi');
    
    Route::get('/kontrak/{id}/cetak', [kontrakController::class, 'cetak'])->name('kontrak.cetak');
    
});

require __DIR__.'/auth.php';
