<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/apidata', [HomeController::class, 'publicApi']);
Route::post('/like', [HomeController::class, 'like']);
Route::get('/like', [HomeController::class, 'likes']);
