<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kotakmasuk extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket','id_user','judul','tanggal'];

    public function paketpekerjaan()
    {
        return $this->belongsTo(paketpekerjaan::class, 'id_paket');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
}
