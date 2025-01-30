<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable= ["name",'city','logo_url','founded_year'];

    // One to one relationship with standing 
    public function standing(){
        return $this->hasOne(Standing::class);
    }

    // One to Many relationship with player 
    public function player(){
        return $this->hasMany(Player::class);
    }

    // One To One Polymorphic relationship with Media table
    public function medias(){
        return $this->morphOne(Media::class,'mediable');
    }

    // One To Many Polymorphic relationship with Media table
    public function mediasMany(){
        return $this->morphMany(Media::class,'mediable');
    }
}