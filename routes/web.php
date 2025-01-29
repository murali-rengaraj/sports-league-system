<?php

use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ShowController;
use App\Http\Middleware\CheckDays;
use Illuminate\Http\Request;
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
Route::get('manyToMany', [RelationshipController::class,'ManyToMany']);
Route::get('hasOneThrough', [RelationshipController::class,'HasOneThrough']);
Route::get('hasManyThrough', [RelationshipController::class,'HasManyThrough']);
Route::get('oneToOnePolymorphic', [RelationshipController::class,'OneToOnePolymorphic']);
Route::get('oneToManyPolymorphic',[RelationshipController::class,'oneToManyPolymorphic']);

//Custom middleware
Route::get('/checkdays/{day?}', function ($d){
    return view('tasks.checkdays',compact('d'));
})->middleware('checkdays');

//Except CSRF token
Route::get('/form_without_csrf',function(){
    return view('tasks.form_without_csrf');
})->name('form_without_csrf');
Route::post('/form_without_csrf',function(Request $request){
    echo "Name: ".$request->name. "<br>";
    return "Form Submitted Sucessfully!";
});
