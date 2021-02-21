<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\User\LinkController;
use App\Http\Controllers\User\UserController;

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



Route::prefix('/auth')->group(function () {
    Route::post('/signup', [SignupController::class,'createUser']);
    Route::post('/login', [LoginController::class,'login']);
    Route::post('/logout', [LoginController::class,'logoutUser']);
});

Route::middleware(['auth:sanctum'])->prefix('/user')->group(function () {
    Route::get('/', [UserController::class,'getUser']);
});

Route::middleware(['auth:sanctum'])->prefix('/link')->group(function () {
    Route::get('/', [LinkController::class,'getLink']);
    Route::post('/', [LinkController::class,'createLink']);
    Route::delete('/', [LinkController::class,'deleteLink']);
    Route::patch('/', [LinkController::class,'updateLink']);
});
