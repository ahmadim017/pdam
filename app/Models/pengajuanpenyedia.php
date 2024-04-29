<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuanpenyedia extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_user','status','konfirmasi'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function getUpdatedAtAttribute()
    {
    
    return
     Carbon::parse($this->attributes['updated_at'])
     ->locale('id')->isoFormat('D MMMM Y');
    }
}
