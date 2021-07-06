<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [CommonController::class, 'home'])->name('home');
});

Route::prefix('/posts')->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('post-list');
    Route::get('/{post}', [PostController::class, 'show'])->name('post-show');
    Route::get('/{post}/{vote}', [PostController::class, 'vote'])->name('post-vote');
});
