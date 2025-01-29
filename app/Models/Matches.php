<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    public function medias(){
        return $this->morphOne(Media::class,'mediable');
    }
    
    public function mediasMany(){
        return $this->morphMany(Media::class,'mediable');
    }
}
