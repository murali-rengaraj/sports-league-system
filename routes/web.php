<?php

use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/players',[ShowController::class,'showPlayers']);

Route::get('/teams',[ShowController::class,'showTeams']);
Route::get('/standings',[ShowController::class,'showStandings']);

//Eloquent Relationship Task
Route::get('oneToOne', [RelationshipController::class,'OneToOne']);
Route::get('oneToMany', [RelationshipController::class,'OneToMany']);
