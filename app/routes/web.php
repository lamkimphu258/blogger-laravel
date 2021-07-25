<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CommonController::class, 'home'])->name('home');

Route::prefix('/posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post-list');
    Route::get('/{post}', [PostController::class, 'show'])->name('post-show');
    Route::get('/{post}/{vote}', [PostController::class, 'vote'])
        ->name('post-vote')
        ->middleware('auth');
});

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [RegistrationController::class, 'registerUser'])->name('register-view');
Route::post('/register', [RegistrationController::class, 'storeUser'])->name('register');
