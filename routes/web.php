<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'home']);
Route::post('/post', [PostController::class, 'post']);
Route::post('/post/{post}/like', [PostController::class, 'likePost']);