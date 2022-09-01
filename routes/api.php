<?php

    use App\Http\Controllers\Api\ClientController;
    use App\Http\Controllers\Api\OportunityController;
    use App\Http\Controllers\Api\ProductController;
    use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return response()->json(['message' => 'Welcome to the VITAMINA!!!'], 200);
});

Route::prefix('auth')->group(function(){
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('me', [LoginController::class, 'me'])->name('me');

    Route::prefix('products')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{identify}', [ProductController::class, 'show'])->name('products.show');
        Route::put('/{identify}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{identify}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::prefix('clients')->group(function(){
        Route::get('/', [ClientController::class, 'index'])->name('clients.index');
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{identify}', [ClientController::class, 'show'])->name('clients.show');
        Route::put('/{identify}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{identify}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });

    Route::prefix('oportunities')->group(function(){
        Route::get('/', [OportunityController::class, 'index'])->name('oportunities.index');
        Route::post('/', [OportunityController::class, 'store'])->name('oportunities.store');
        Route::get('/{identify}', [OportunityController::class, 'show'])->name('oportunities.show');
        Route::put('/{identify}', [OportunityController::class, 'update'])->name('oportunities.update');
        Route::delete('/{identify}', [OportunityController::class, 'destroy'])->name('oportunities.destroy');
    });
});
