<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/', [Dashboard::class, 'index']);

Route::get('/dictionary', [DictionaryController::class, 'index']);

Route::get('/homework3', [App\Http\Controllers\Homework3Controller::class, 'index']);

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/{letter}', [DictionaryController::class, 'show']);