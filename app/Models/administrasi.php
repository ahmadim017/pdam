<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrasi extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','npwp','nama','namadirektur','telpon','email','id_badanusaha','alamat','id_provinsi','id_kabupaten','nopkp','filenpwp','filepkp','website','kodepos','kantorcabang'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function badanusaha()
    {
        return $this->belongsTo(badanusaha::class,'id_badanusaha');
    }
    public function provinsi()
    {
        return $this->belongsTo(provinsi::class,'id_provinsi');
    }
    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class,'id_kabupaten');
    }
}
