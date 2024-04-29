<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nontender extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket','id_user','created_by','metodepengadaan','nosurat'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function paketpekerjaan()
    {
        return $this->belongsTo(paketpekerjaan::class, 'id_paket');
    }
}
