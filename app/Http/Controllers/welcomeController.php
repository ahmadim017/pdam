<?php

namespace App\Http\Controllers;

use App\Models\detailtender;
use App\Models\jadwal;
use App\Models\nontender;
use App\Models\slide;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $slide = slide::where('status','ACTIVE')->get();
        $jadwal = jadwal::all();
        //$nontender = nontender::where('status','Verifikasi')->paginate(10);
        $detailtender = detailtender::where('jenistender','terbuka')->paginate(10);
        return view('welcome',[
            'slide' => $slide,
            'detailtender'=>$detailtender,
            'jadwal'=>$jadwal,
        ]);
    }
}
