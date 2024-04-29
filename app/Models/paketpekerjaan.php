<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paketpekerjaan extends Model
{
    use HasFactory;

    public function nontender()
    {
        return $this->hasOne(nontender::class, 'id_paket');
    } 

    public function kotakmasuk()
    {
        return $this->hasOne(kotakmasuk::class, 'id_paket');
    } 
}
