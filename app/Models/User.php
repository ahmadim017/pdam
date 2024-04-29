<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'npwp',
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pengajuanpenyedia()
    {
        return $this->hasMany('App\Models\pengajuanpenyedia');
    }
    public function administrasi()
    {
        return $this->hasOne(administrasi::class,'id_user');
    }
    public function aktapendirian()
    {
        return $this->hasOne(aktapendirian::class, 'id_user');
    }
    public function aktaperubahan()
    {
        return $this->hasOne(aktaperubahan::class, 'id_user');
    }
    public function dukumenlainnya()
    {
        return $this->hasOne(dokumenlainnya::class, 'id_user');
    }
    public function izinusaha()
    {
        return $this->hasOne(izinusaha::class, 'id_user');
    }
    public function pengurusperusahaan()
    {
        return $this->hasOne(pengurusperushaan::class, 'id_user');
    }
    public function pajak()
    {
        return $this->hasOne(pajak::class, 'id_user');
    }
    public function pengalaman()
    {
        return $this->hasOne(pengalaman::class, 'id_user');
    }
    public function tenagaahli()
    {
        return $this->hasOne(tenagaahli::class, 'id_user');
    }
    public function perlengkapan()
    {
        return $this->hasOne(perlengkapan::class, 'id_user');
    }

    public function perubahanpenyedia()
    {
        return $this->hasOne(perubahanpenyedia::class, 'id_user');
    }
}
