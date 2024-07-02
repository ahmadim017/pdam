<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtender extends Model
{
    use HasFactory;

    protected $fillable = ['id_paket','created_by','metodepengadaan','jenistender','íd_user'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function tender()
    {
        return $this->belongsTo(tender::class, 'id_paket');
    }
}
