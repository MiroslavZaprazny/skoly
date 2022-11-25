<?php

use App\Http\Controllers\CollageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
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

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/collages', [CollageController::class, 'search']);
Route::get('/collage/{collage}', [CollageController::class, 'show']);

Route::post('/rating', [RatingController::class, 'store']);
Route::delete('/rating/{rating}/{code?}', [RatingController::class, 'destroy'])->where('code', '.*');
Route::get('/rating/{rating}', [RatingController::class, 'show']);
