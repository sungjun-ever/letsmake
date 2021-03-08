<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/users')->group(function(){
    Route::get('/register', [UserController::class, 'registerIndex'])->name('users.register');
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'loginIndex'])->name('users.login');
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
});

Route::resource('frees', FreeController::class);
Route::resource('frees.comments', CommentController::class);
Route::resource('comments', CommentController::class);
Route::get('/frees/search', [FreeController::class, 'search'])->name('frees.search');





