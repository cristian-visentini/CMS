<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
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

/*
Route::middleware('auth')->prefix('admin')->group(function () {
   // dd('chegou no prefix');
    Route::get( '/', [AdminController::class, 'index'])->name('admin.index');
    Route::get( 'login', [LoginController::class, 'login'])->name('admin.login');
});
*/
Route::prefix('admin')->group(function () {
    // dd('chegou no prefix');
     Route::get( '/', [AdminController::class, 'index'])->name('admin.index');
    // Route::get( 'login', [LoginController::class, 'login'])->name('login');

    Route::prefix('login')->group(function () {
        // dd('chegou no login');
         Route::get( '/', [LoginController::class, 'index'])->name('login');
         Route::post( '/', [LoginController::class, 'login'])->name('login.login');
         Route::post( '/logout', [LoginController::class, 'logout'])->name('login.logout');
     });
 });





Route::get( '/', [SiteController::class, 'index'])->name('site.index');
