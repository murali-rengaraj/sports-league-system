<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable= ["team_id","name","date_of_birth","nationality"];

    // inverse one to many relationship with team
    public function team(){
        return $this->belongsTo(Team::class);
    }

    // Has One Through relationship with Standing through Team
    public function standing() {
        // $this->hasOneThrough(FinalModel, IntermediateModel, foreignKeyOnIntermediate, foreignKeyOnFinalModel, localKeyOnCurrentModel, localKeyOnIntermediateModel);

        return $this->hasOneThrough(Standing::class,Team::class, 'id', 'team_id', 'team_id', 'id');
    }

    // Has Many Through relationship with Matches through Team
    public function matches(){
        return $this->hasManyThrough(Matches::class,Team::class,'id','home_team_id','team_id','id');
    }

    // Many To Many relationship with Awards using award_player table
    public function awards(){
        return $this->belongsToMany(Award::class,'award_player');
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
