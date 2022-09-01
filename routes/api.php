<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return response()->json(['message' => 'Welcome to the VITAMINA!!!'], 200);
});

Route::prefix('auth')->group(function(){
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('recover-password', [LoginController::class, 'recoverPassword']);
    Route::post('change-password', [LoginController::class, 'changePassword']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('me', [LoginController::class, 'me'])->name('me');


});
