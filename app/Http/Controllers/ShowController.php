<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Standing;
use App\Models\Team;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // Show All Players 
    public function showPlayers(){
        $rows = Player::all();
        return view('players',compact('rows'));
    }

    // Show All Teams (in progress)
    public function showTeams(){
        // $rows= Team::all();
        $rows=Team::first();
        dd($rows->standing);
    }

    // Show All Standings (in progress)
    public function showStandings(){
        $rows=Standing::get();
        dd($rows);
    }

    public function createPlayerAward(){
        $teams= Team::all();
        $players = Player::all();
        return view('create-player-award', ['players'=>$players]);
    }
    public function storePlayerAward(){

        return view('create-player-award');
    }
}
