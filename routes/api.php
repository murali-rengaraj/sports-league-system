<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [ApiController::class, 'logout']);
    Route::get('/players', [ApiController::class, 'index']);
    Route::get('/player/{id}', [ApiController::class, 'show']);
    Route::put('/player/{id}', [ApiController::class, 'update']);
    Route::post('/player', [ApiController::class, 'destroy']);
});
