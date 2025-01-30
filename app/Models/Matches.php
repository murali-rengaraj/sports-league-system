<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    // One To One Polymorphic relationship with Media table
    public function medias(){
        return $this->morphOne(Media::class,'mediable');
    }

    // One To Many Polymorphic relationship with Media table
    public function mediasMany(){
        return $this->morphMany(Media::class,'mediable');
    }
}
