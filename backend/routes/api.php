<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RatingLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/collages', [CollageController::class, 'search']);
Route::get('/collage/{collage:slug}', [CollageController::class, 'show']);

Route::get('/rating/{rating}', [RatingController::class, 'show']);
Route::post('/rating', [RatingController::class, 'store']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::patch('/profile/{user}', [UserController::class, 'update']);
    Route::get('/profile/{user}', [UserController::class, 'show']);

    Route::post('/rating/{rating}/like', [RatingLikeController::class, 'create']);
    Route::delete('/rating/{rating}', [RatingController::class, 'destroy']);

    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
