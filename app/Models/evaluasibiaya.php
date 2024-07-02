<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasibiaya extends Model
{
    use HasFactory;

    protected $fillable = ['id_paket','id_user','hargaterkoreksi','persenhps','nilaiharga','status'];
}
