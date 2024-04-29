<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket','kegiatan','tglpelaksanaan','waktumulai','waktuselesai'];

    
}
