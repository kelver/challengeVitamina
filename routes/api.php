<?php

use App\Http\Controllers\Api\{
    AuthController,
    BooksController,
};
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'store'])->name('register');

Route::get('/', function(){
    return response()->json([
        'message' => 'ok'
    ]);
});

Route::group(['middleware' => ['apiJwt']], function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('register');
    Route::put('/books/{identify}', [BooksController::class, 'update']);
    Route::delete('/books/{identify}', [BooksController::class, 'destroy']);
    Route::get('/books/{identify}', [BooksController::class, 'show']);
    Route::post('/books/find', [BooksController::class, 'search']);
    Route::post('/books', [BooksController::class, 'store']);
    Route::get('/books', [BooksController::class, 'index']);
});
