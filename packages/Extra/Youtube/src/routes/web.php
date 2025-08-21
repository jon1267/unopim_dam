<?php

use Illuminate\Support\Facades\Route;
use Extra\Youtube\Http\Controllers\YoutubeController;

Route::get('/', [YoutubeController::class, 'index'])->name('index');
Route::get('/create', [YoutubeController::class, 'create'])->name('create');
Route::post('/', [YoutubeController::class, 'store'])->name('store');
Route::delete('/{video}', [YoutubeController::class, 'destroy'])->name('destroy');
