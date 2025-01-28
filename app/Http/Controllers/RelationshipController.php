<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Media;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function OneToOne()
    {
        $rows = Team::all();
        // dd($rows);
        return view('relationship.one_to_one', compact('rows'));
    }

    public function OneToMany()
    {
        // $rows= Team::find(1);
        $rows = Team::all();
        // dd($rows);
        return view('relationship.one_to_many', ["rows" => $rows]);
    }

    public function ManyToMany(){
        $rows=Player::all();
        // $rows = Player::find(1);
        // dd($rows);
        return view('relationship.many_to_many',['rows'=>$rows]);
    }

    public function HasOneThrough()
    {
        $player = Player::all();
        // dd($player->standing);
        return view('relationship.has_one_through', ["rows" => $player]);
    }

    public function HasManyThrough()
    {
        $player = Player::all();

        // dd($player->matches);
        return view('relationship.has_many_through', ["rows" => $player]);
    }

    public function OneToOnePolymorphic(){
        // $teams= Team::find(1);
        // $player= Player::find(1);
        $media= Media::all();
        // dd($media);

        // dd($teams->medias);
        return view('relationship.one_to_one_polynomic', ['medias'=>$media]);
    }
}
