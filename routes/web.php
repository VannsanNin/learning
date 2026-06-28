<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersPhotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/', [Dashboard::class, 'index']);

Route::get('/dictionary', [DictionaryController::class, 'index']);

Route::get('/homework3', [App\Http\Controllers\Homework3Controller::class, 'index']);
Route::get('/homework4', [App\Http\Controllers\Homework4Controller::class, 'index']);
Route::get('/homework41', [App\Http\Controllers\Homework4Controller::class, 'products']);
Route::get('/homework41/create', [App\Http\Controllers\Homework4Controller::class, 'create']);
Route::post('/homework41', [App\Http\Controllers\Homework4Controller::class, 'store']);

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/users-photo', [UsersPhotoController::class, 'index']);
Route::post('/users-photo', [UsersPhotoController::class, 'store']);

Route::get('/{letter}', [DictionaryController::class, 'show']);