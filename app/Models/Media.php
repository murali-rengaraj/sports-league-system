<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table='medias';

    // Inverce One To One/Many Polymorphic relationship 
    public function mediable(){
        return $this->morphTo();
    }
}
