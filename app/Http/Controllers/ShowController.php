<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Standing;
use App\Models\Team;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function showPlayers(){
        $rows = Player::all();
        return view('players',compact('rows'));
    }

    public function showTeams(){
        // $rows= Team::all();
        $rows=Team::first();
        dd($rows->standing);
    }

    public function showStandings(){
        $rows=Standing::get();
        dd($rows);
    }
}
