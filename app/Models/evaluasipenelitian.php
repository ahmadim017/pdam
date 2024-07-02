<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasipenelitian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_paket',
        'id_user',
        'id_persyaratankualifikasi',
        'status',
    ];
}
