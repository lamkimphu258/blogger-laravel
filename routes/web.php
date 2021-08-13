<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', [PostController::class, 'index'])
    ->name('post-list');

Route::prefix('/posts')->group(
    function () {
        Route::get('/{post}', [PostController::class, 'show'])
            ->name('post-show');
    }
);

Route::middleware(['auth'])->group(
    function () {
        Route::prefix('/member/posts')->group(
            function () {
                Route::get('/', [PostController::class, 'indexByAuthor'])
                    ->name('post-list-by-author');
                Route::get('/create', [PostController::class, 'create'])
                    ->name('post-create');
                Route::post('/create', [PostController::class, 'store'])
                    ->name('post-store');
                Route::get('/delete/{id}', [PostController::class, 'destroy'])
                    ->name('post-delete');
                Route::get('/{post}', [PostController::class, 'edit'])
                    ->name('post-edit');
                Route::post('/{post}', [PostController::class, 'update'])
                    ->name('post-update');
                Route::get('/{post}/{vote}', [PostController::class, 'vote'])
                    ->name('post-vote');
            }
        );
    }
);

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [RegistrationController::class, 'registerUser'])->name('register-view');
Route::post('/register', [RegistrationController::class, 'storeUser'])->name('register');
