<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/', [Dashboard::class, 'index']);

Route::get('/dictionary', [DictionaryController::class, 'index']);

Route::get('/{letter}', [DictionaryController::class, 'show']);