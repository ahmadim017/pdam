<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prosestender extends Model
{
    use HasFactory;

    protected $fillable = ['id_paket','id_user'];

    public function tender()
    {
        return $this->belongsTo(tender::class, 'id_paket');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function undangan()
    {
        return $this->hasMany(undanganklarifikasi::class, 'id_prosestender');
    }
}
