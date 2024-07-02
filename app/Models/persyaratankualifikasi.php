<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persyaratankualifikasi extends Model
{
    use HasFactory;
    public function kategorikualifikasi()
    {
        return $this->belongsTo(Kategorikualifikasi::class, 'id_kategorikualifikasi', 'id');
    }
}
