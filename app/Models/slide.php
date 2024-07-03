<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    use HasFactory;
    public function getImage()
    {
        if (substr($this->image, 0, 5) == "https"){
            return $this->image;
        }

        if ($this->image){
            return asset('storage/app/public/slide/image/'. $this->image);
        }
    }
}
