<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasiteknis extends Model
{
    use HasFactory;
    public function kategoriteknis()
    {
        return $this->belongsTo(kategoriteknis::class, 'id_kategoriteknis', 'id');
    }
}
