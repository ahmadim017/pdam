<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class undanganklarifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_prosestender',
        'id_paket',
        'id_user',
        'nosurat',
        'tglsurat',
        'waktumulai',
        'waktuselesai'
    ];

    public function tender()
    {
        return $this->belongsTo(Tender::class, 'id_paket');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function prosestender()
    {
        return $this->belongsTo(Prosestender::class, 'id_prosestender');
    }
}
