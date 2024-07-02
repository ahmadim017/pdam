<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorikualifikasi extends Model
{
    use HasFactory;
    public function persyaratankualifikasi()
    {
        return $this->hasMany(Persyaratankualifikasi::class, 'id_kategorikualifikasi', 'id');
    }
}
