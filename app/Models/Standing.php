<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    protected $fillable= ['matches_played','wins','draws','losses'];

    // inverse one to one relationship with team 
    public function team(){
        return $this->belongsTo(Team::class);
    }
}