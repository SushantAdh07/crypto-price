<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/crypto', [App\Http\Controllers\CryptocurrencyController::class, 'index'])->name('crypto.index');
Route::post('/crypto/fetch', [App\Http\Controllers\CryptocurrencyController::class, 'fetch'])->name('crypto.fetch');
