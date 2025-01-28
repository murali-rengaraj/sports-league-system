<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function standing(){
        return $this->hasOne(Standing::class);
    }

    public function player(){
        return $this->hasMany(Player::class);
    }

    public function medias(){
        return $this->morphOne(Media::class,'mediable');
    }
}