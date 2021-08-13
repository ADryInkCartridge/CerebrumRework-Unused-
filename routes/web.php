<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PanitiaController;
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
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginUser',[AdminController::class, 'login'])->name('login.post');
Route::get('/testing',[HomeController::class, 'testing'])->name('testing');
Route::get('/ormawa',[HomeController::class, 'ormawa'])->name('ormawa');
Route::get('/panitia',[PanitiaController::class, 'index'])->name('panitia');
Route::get('/homeormawa',[HomeController::class, 'ormawanav'])->name('ormawanav');
Route::get('/homepanitia', [HomeController::class, 'panitianav'])->name('panitianav');
Route::get('file-import-export', [MahasiswaController::class, 'fileImportExport']);
Route::post('file-import', [MahasiswaController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [MahasiswaController::class, 'fileExport'])->name('file-export');
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');

