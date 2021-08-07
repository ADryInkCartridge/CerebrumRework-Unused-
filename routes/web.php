<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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
// Auth::routes();
Route::get('/',[HomeController::class, 'landing'])->name('landing');
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginUser',[AdminController::class, 'login'])->name('login.post');
Route::get('/testing',[HomeController::class, 'testing'])->name('testing');

