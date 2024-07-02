<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tender extends Model
{
    use HasFactory;

    // Menonaktifkan auto-incrementing dan mengatur tipe primary key
    public $incrementing = false;
    protected $keyType = 'int';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do {
                // Generate random 6 digit number
                $id = random_int(100000, 999999);
            } while (self::where('id', $id)->exists());

            $model->id = $id;
        });
    }

    public function detailtender()
    {
        return $this->hasOne(detailtender::class, 'id_paket');
    } 
    public function prosestender()
    {
        return $this->hasOne(prosestender::class, 'id_paket');
    } 

    public function undanganverifikasi()
    {
        return $this->hasOne(prosestender::class, 'id_paket');
    } 
}
