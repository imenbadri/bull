<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;

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
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', [LinkController::class, 'listAll'])->name('/');


    /* Auth Routes */
Route::get('/auth/loginPage', [UserController::class, 'loginPage'])->name('loginPage');
Route::post('/auth/login', [UserController::class, 'login'])->name('login');

Route::get('auth/logout', [UserController::class, 'logout'])->name('logout');

Route::get('auth/signup', [UserController::class, 'signup'])->name('signup');
Route::post('auth/register', [UserController::class, 'register'])->name('register');
/* END Auth Routes */
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    /* Links Routes */
    Route::get('/link/list', [LinkController::class, 'list'])->name('list');
    Route::post('/link/create', [LinkController::class, 'create'])->name('createLink');

    Route::post('/link/delete/{id}', [LinkController::class, 'delete'])->name('deleteLink');
    /* END Links Routes */
    
});
