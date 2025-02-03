<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\award_player;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Team;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // Show All Players 
    public function showPlayers()
    {
        // $rows = Player::all();
        $players = Player::paginate(4);
        return view('players', compact('players'));
    }

    // Show All Teams (in progress)
    public function showTeams()
    {
        // $rows= Team::all();
        $rows = Team::first();
        dd($rows->standing);
    }

    // Show All Standings (in progress)
    public function showStandings()
    {
        $rows = Standing::get();
        dd($rows);
    }

    public function createPlayerAward()
    {
        $teams = Team::all();
        $awards= Award::all();
        return view('create-player-award', ['awards'=>$awards, 'teams' => $teams]);
    }

    public function createPlayersOfTeam(Request $request)
    {
        $team = Team::find($request->id);
        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }

        $players = $team->player;
        return response()->json(['players' => $players]);
    }

    public function storePlayerAward(Request $request)
    {
        // dd($request);

        $request->validate([
            'award_id'=>'required|integer|exists:awards,id',
            'team_id'=>'required|integer|exists:teams,id',
            'player_id'=>'required|integer|exists:players,id',
        ]);

        $award = new award_player();
        $award->award_id = $request->award_id;
        $award->player_id = $request->player_id;
        $award->save();

        return back()->with('success','Award Inserted Successfully!');
    }
}
