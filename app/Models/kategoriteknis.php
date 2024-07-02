<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriteknis extends Model
{
    use HasFactory;

    public function evaluasiteknis()
    {
        return $this->hasMany(evaluasiteknis::class, 'id_kategoriteknis', 'id');
    }
}
