<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasiakhir extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket','id_user','nilaiakhir','status'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
}
