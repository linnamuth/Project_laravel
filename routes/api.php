<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTeamController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user
Route::get('/users',[UserController::class,'index']);
Route::post('/user',[UserController::class,'store']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::put('/user/{id}',[UserController::class,'update']);
Route::delete('/user/{id}',[UserController::class,'destroy']);

// event
Route::get('/events',[EventController::class,'index']);
Route::post('/event',[EventController::class,'store']);
Route::get('/event/{id}',[EventController::class,'show']);
Route::put('/event/{id}',[EventController::class,'update']);
Route::delete('/event/{id}',[EventController::class,'destroy']);

// team
Route::get('/teams',[TeamController::class,'index']);
Route::post('/team',[TeamController::class,'store']);
Route::get('/team/{id}',[TeamController::class,'show']);
Route::put('/team/{id}',[TeamController::class,'update']);
Route::delete('/team/{id}',[TeamController::class,'destroy']);

// eventTeam
Route::get('/eventTeams',[EventTeamController::class,'index']);
Route::post('/eventTeam',[EventTeamController::class,'store']);
Route::get('/eventTeam/{id}',[EventTeamController::class,'show']);
Route::put('/eventTeam/{id}',[EventTeamController::class,'update']);
Route::delete('/eventTeam/{id}',[EventTeamController::class,'destroy']);

// ticket
Route::get('/tickets',[TicketController::class,'index']);
Route::post('/ticket',[TicketController::class,'store']);
Route::get('/ticket/{id}',[TicketController::class,'show']);
Route::put('/ticket/{id}',[TicketController::class,'update']);
Route::delete('/ticket/{id}',[TicketController::class,'destroy']);

//search name
Route::get('/search/{name}',[EventController::class,'search']);