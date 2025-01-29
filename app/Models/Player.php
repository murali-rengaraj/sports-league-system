<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function standing() {
        // $this->hasOneThrough(FinalModel, IntermediateModel, foreignKeyOnIntermediate, foreignKeyOnFinalModel, localKeyOnCurrentModel, localKeyOnIntermediateModel);

        return $this->hasOneThrough(Standing::class,Team::class, 'id', 'team_id', 'team_id', 'id');
    }

    public function matches(){
        return $this->hasManyThrough(Matches::class,Team::class,'id','home_team_id','team_id','id');
    }

    public function awards(){
        return $this->belongsToMany(Award::class,'award_player');
    }

    public function medias(){
        return $this->morphOne(Media::class,'mediable');
    }
    
    public function mediasMany(){
        return $this->morphMany(Media::class,'mediable');
    }
}
