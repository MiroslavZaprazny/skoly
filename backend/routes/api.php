<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/collages', [CollageController::class, 'search']);
Route::get('/collage/{collage}', [CollageController::class, 'show']);

Route::get('/rating/{rating}', [RatingController::class, 'show']);
Route::post('/rating', [RatingController::class, 'store']);
Route::delete('/rating/{rating}', [RatingController::class, 'destroy']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile/{user}', [UserController::class, 'show']);
    Route::put('/profile/{user}', [UserController::class, 'update']);
});
