<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\ShowController;
use App\Http\Middleware\CheckDays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'createRegister');
    Route::post('/register', 'storeRegister');
    Route::get('/login', 'showLogin');
    Route::post('/login', 'checkLogin')->name('login');
    Route::post('/logout', 'logout');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    //Show all Players
    Route::get('/players', [ShowController::class, 'showPlayers']);

    //Show all Teams and Standings (in Progress)
    Route::get('/teams', [ShowController::class, 'showTeams']);
    Route::get('/standings', [ShowController::class, 'showStandings']);


    Route::get('/player-award', [ShowController::class, 'createPlayerAward']);
    Route::post('/player-award', [ShowController::class, 'createPlayersOfTeam']);
    Route::post('/awardPlayer', [ShowController::class, 'storePlayerAward'])->name('awardPlayer');
});


//Eloquent Relationship Task
Route::middleware(['auth'])->group(function () {
    Route::get('oneToOne', [RelationshipController::class, 'OneToOne']);
    Route::get('oneToMany', [RelationshipController::class, 'OneToMany']);
    Route::get('manyToMany', [RelationshipController::class, 'ManyToMany']);
    Route::get('hasOneThrough', [RelationshipController::class, 'HasOneThrough']);
    Route::get('hasManyThrough', [RelationshipController::class, 'HasManyThrough']);
    Route::get('oneToOnePolymorphic', [RelationshipController::class, 'OneToOnePolymorphic']);
    Route::get('oneToManyPolymorphic', [RelationshipController::class, 'oneToManyPolymorphic']);
});

//Custom middleware task
Route::get('/checkdays/{day?}', function ($d) {
    return view('tasks.checkdays', compact('d'));
})->middleware('checkdays');

//Except CSRF token task
Route::get('/form_without_csrf', function () {
    return view('tasks.form_without_csrf');
})->name('form_without_csrf');
Route::post('/form_without_csrf', function (Request $request) {
    echo "Name: " . $request->name . "<br>";
    return "Form Submitted Sucessfully!";
});




// Belows are created for just learning purpose
Route::redirect('/test', '/', 301);
Route::view('/test1', 'welcome');
Route::get('test3/{name?}', function ($n = 'hello') {
    return $n;
});
Route::get('test4/{name}/{id}', function ($n, $id) {
    echo md5($n);

    // echo md5(md5($n));
    return $n . $id;
})->whereNumber('id');

Route::prefix('pre')->group(function () {
    Route::get("/test", function () {
        return "pre/test";
    });
});
Route::match(['get', 'post'], '/match', function () {
    return "Match";
});
Route::fallback(function () {
    return "404";
});
