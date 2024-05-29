<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paketpekerjaan extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'int';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do {
                // Generate random 6 digit number
                $id = random_int(1000000, 9999999);
            } while (self::where('id', $id)->exists());

            $model->id = $id;
        });
    }

    public function nontender()
    {
        return $this->hasOne(nontender::class, 'id_paket');
    } 

    public function kotakmasuk()
    {
        return $this->hasOne(kotakmasuk::class, 'id_paket');
    } 
}
