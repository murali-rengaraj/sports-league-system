<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        // $request->validate([
        //     'name'=> 'required|string|max:100',
        //     'email'=> 'required|email|unique:users,email|max:100',
        //     'password'=> 'required|min:8',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response([
                "message" => "error",
                "errors" => $validator->messages(),
            ], 422); #422 = unable to process request
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        $token = $user->createToken('colan')->plainTextToken;
        return response()->json(["message" => "success", "token" => $token], 200); //201->create
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        if (Auth::attempt($request->all())) {

            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('colan')->plainTextToken;
            return response()->json([
                'message' => 'login success',
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'errors' => 'Invalid email or password',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            "message" => "Logout Successfully!"
        ]);
    }

    public function index()
    {
        $players = Player::all();
        if (count($players) > 0) {
            return response()->json([
                "message" => "success",
                "players" => $players,
            ]);
        } else {
            return response()->json([
                "message" => "success",
                "players" => "No player found",
            ]);
        }
    }

    public function show($id)
    {
        $player = Player::find($id);
        if (strlen($player) > 0) {
            return response()->json([
                "message" => "success",
                "player" => $player,
            ]);
        } else {
            return response()->json([
                "message" => "success",
                "player" => "No player found",
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $player = Player::find($request->id);
        if (strlen($player) > 0) {
            $player->delete();
            return response()->json([
                "message" => "Player id:" . $request->id . " Deleted Successfully",
            ]);
        } else {
            return response()->json([
                "message" => "Player Not Found",
            ]);
        }
    }

    // public function update(Request $request){
    //     $validator =Validator::make([]);
    // }

}
