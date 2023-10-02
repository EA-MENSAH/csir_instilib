<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ThesisController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\BookMonographController;
use App\Http\Controllers\SciTechnologyConferenceController;




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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/user', [Usercontroller::class, 'create']);
Route::post('/user/login', [Usercontroller::class, 'login']);

Route::get('/thesis/{id}', [ThesisController::class, 'show']);
Route::get('/thesis/search/{input}', [ThesisController::class, 'search']);
Route::get('/thesis', [ThesisController::class, 'index']);


Route::get('/stc/{id}', [SciTechnologyConferenceController::class, 'show']);
Route::get('/stc/search/{input}', [SciTechnologyConferenceController::class, 'search']);
Route::get('/stc', [SciTechnologyConferenceController::class, 'index']);


Route::get('/bm/{id}', [BookMonographController::class, 'show']);
Route::get('/bm/search/{input}', [BookMonographController::class, 'search']);
Route::get('/bm', [BookMonographController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {

    // user
    Route::get('/user', [Usercontroller::class, 'index']);
    Route::post('/user/update/{id}', [Usercontroller::class, 'update']);
    Route::get('/user/destroy/{id}', [Usercontroller::class, 'delete']);
    Route::get('/user/{id}', [Usercontroller::class, 'show']);
    Route::get('/user/logout', [Usercontroller::class, 'logout']);

    

    // thesis
    Route::post('/thesis', [ThesisController::class, 'create']);
    Route::post('/thesis/update/{id}', [ThesisController::class, 'update']);
    Route::get('/thesis/destroy/{id}', [ThesisController::class, 'delete']);


    //b&m
    Route::post('/bm', [BookMonographController::class, 'create']);
    Route::post('/bm/update/{id}', [BookMonographController::class, 'update']);
    Route::get('/bm/destroy/{id}', [BookMonographController::class, 'delete']);

    //stc
    Route::post('/stc', [SciTechnologyConferenceController::class, 'create']);
    Route::post('/stc/update/{id}', [SciTechnologyConferenceController::class, 'update']);
    Route::get('/stc/destroy/{id}', [SciTechnologyConferenceController::class, 'delete']);

});