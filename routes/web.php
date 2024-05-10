<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('import')->name('import.')->group(function(){
        Route::get('/', [App\Http\Controllers\ImportController::class, 'show'])->name('show');
        Route::post('/', [App\Http\Controllers\ImportController::class, 'import'])->name('save');
    });
    
    Route::prefix('items')->name('items.')->group(function(){
        Route::prefix('one')->name('one.')->group(function(){
            Route::get('/', [App\Http\Controllers\ItemsController::class, 'show'])->name('show');
            Route::get('/{id}', [App\Http\Controllers\ItemsController::class, 'find'])->name('find');
        });
    });
});