<?php

namespace App\Http\Controllers;

use App\Models\nontender;
use App\Models\paketpekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {

        $kategori = DB::table('paketpekerjaans')->select('klasifikasi', DB::raw('SUM(pagu) as pagu'))
        ->groupBy('klasifikasi')->get();
        $datakategori = [];
        $pagu = [];
        foreach ($kategori as $k) {
            $datakategori[] = $k->klasifikasi;
            $pagu[] = intval($k->pagu);
        }

        
        $usulan = DB::table('paketpekerjaans')->select(DB::raw('count(*) as total, klasifikasi'))
        ->where('klasifikasi','<>',1)->groupBy('klasifikasi')->get();
        $data = [];

        foreach ($usulan as $u) {
            $data[] = [$u->klasifikasi,$u->total];
        }

        
        //dd( json_encode($pagu));
        $diterima = nontender::where('status', 'Diterima')->count();
        $verifikasi = nontender::where('status', 'Verifikasi')->count();
        $baru = nontender::count(); 
        $nonteder = nontender::where('status', 'Diterima')->orderBy('hargapenawaran','desc')->get();
        return view('dashboard.index',[
            'nontender' => $nonteder,
            'data' => $data,
            'datakategori' => $datakategori,
            'pagu' => $pagu,
            'verifikasi' => $verifikasi,
            'baru' => $baru,
            'diterima' => $diterima,
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Auth::user()->role == 'ADMIN'||  Auth::user()->role == 'VERIFIKATOR'){
                return $next($request);
            }
            return redirect()->guest('/403');
        });
    }
}
