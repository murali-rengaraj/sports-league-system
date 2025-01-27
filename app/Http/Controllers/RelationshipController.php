<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function OneToOne(){
        $rows= Team::all();
        // dd($rows);
        return view('relationship.one_to_one',compact('rows'));
    }

    public function OneToMany(){
        // $rows= Team::find(1);
        $rows= Team::all();
        // dd($rows);
        return view('relationship.one_to_many',["rows"=>$rows]);
    }
}
