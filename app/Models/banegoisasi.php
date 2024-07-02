<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banegoisasi extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket','id_user','nosurat','tglsurat','hasilnegoisasi'];
}
