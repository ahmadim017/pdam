<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pajak extends Model
{
    use HasFactory;
    public function getTanggalBuktiAttribute()
    {
    
    return
     Carbon::parse($this->attributes['tanggalbukti'])
     ->locale('id')->isoFormat('D MMMM Y');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
}
