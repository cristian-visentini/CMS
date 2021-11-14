<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteController;

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

Route::prefix('site')->group(function (){
    Route::get( '/', [SiteController::class, 'index'])->name('site.index');
});

Route::prefix('admin')->group(function () {

    Route::get( '/', [AdminController::class, 'index'])->name('admin.index');

    Route::prefix('login')->group(function () {
         Route::get( '/', [LoginController::class, 'index'])->name('login');
         Route::post( '/', [LoginController::class, 'login'])->name('login.login');
         Route::post( '/logout', [LoginController::class, 'logout'])->name('login.logout');
     });

     Route::prefix('register')->group(function () {
        Route::get( '/', [UsersController::class, 'index'])->name('register');
        Route::post( '/', [UsersController::class, 'register'])->name('register.action');
    });

 });

Route::get( '/', [SiteController::class, 'index'])->name('site.index');
