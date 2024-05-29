<?php

namespace App\Http\Controllers;

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
        $nontender = nontender::where('status','Verifikasi')->paginate(10);
        return view('welcome',[
            'slide' => $slide,
            'nontender'=>$nontender,
            'jadwal'=>$jadwal,
        ]);
    }
}
