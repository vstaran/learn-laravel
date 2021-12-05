<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::name('users.')->prefix('users')->group(function () {
    Route::post('/register', [UsersController::class, 'register'])->name('register');
    Route::post('/login', [UsersController::class, 'login'])->name('login');
    Route::get('/{user}', [UsersController::class, 'view'])->name('view');
    Route::delete('/{user}', [UsersController::class, 'delete'])->name('delete');
});

Route::resource('tasks', TasksController::class);
