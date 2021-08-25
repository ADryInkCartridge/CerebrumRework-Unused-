<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\TahapController;
use App\Http\Controllers\MhsormawaController;
use Illuminate\Support\Facades\Request;
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

Route::get('/',[HomeController::class, 'landing'])->name('landing');
Route::get('/testing',[HomeController::class, 'testing'])->name('testing');
Route::get('/panitia',[PanitiaController::class, 'index'])->name('panitia');
Route::get('/tambahmahasiswa', [HomeController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');
Route::get('/editmahasiswa', [HomeController::class, 'editmahasiswa'])->name('editmahasiswa');
Route::get('/setpermission', [HomeController::class, 'setpermission'])->name('setpermission');


/* ADMIN ROUTES */
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginUser',[AdminController::class, 'login'])->name('login.post');
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');
Route::get('/listUser', [AdminController::class, 'listUser'])->name('listUser');
Route::get('/tambahUser', [AdminController::class, 'tambahUser'])->name('tambahUser');
Route::post('/tambahUser-post', [AdminController::class, 'addUser'])->name('tambahUser.post');
Route::get('/user/{id}/edit', [AdminController::class, 'getUser'])->name('getUser');
Route::get('/user/update', [AdminController::class, 'userUpdate'])->name('user.update');
Route::post('/user/{user_id}/delete', [AdminController::class, 'destroy'])->name('deleteUser');

/* Ormawa ROUTES */
Route::get('/ormawa',[OrmawaController::class, 'index'])->name('ormawa');
Route::get('/listormawa', [OrmawaController::class, 'listormawa'])->name('listormawa');
Route::get('/tambahormawa', [OrmawaController::class, 'tambahormawa'])->name('tambahormawa');
Route::post('/tambahormawa/add', [OrmawaController::class, 'addOrmawa'])->name('tambahormawa.post');
Route::get('/ormawa/{id}/edit', [OrmawaController::class, 'editOrmawa'])->name('ormawa.edit');
Route::post('/ormawa/update', [OrmawaController::class, 'updateOrmawa'])->name('ormawa.update');
Route::post('/ormawa/{id}/delete', [OrmawaController::class, 'destroy'])->name('ormawa.delete');

/* Kegiatan ROUTES */
Route::get('/tambahkegiatan', [KegiatanController::class, 'tambahkegiatan'])->name('tambahkegiatan');
Route::get('/editkegiatan', [KegiatanController::class, 'editkegiatan'])->name('editkegiatan');
Route::get('/listkegiatan', [KegiatanController::class, 'listkegiatan'])->name('listkegiatan');
Route::get('/tambahkegiatan/post', [KegiatanController::class, 'addKegiatan'])->name('tambahkegiatan.post');
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'editKegiatan'])->name('kegiatan.edit');

/* Mahasiswa ROUTES */
Route::get('file-import-export', [MahasiswaController::class, 'fileImportExport']);
Route::post('file-import', [MahasiswaController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [MahasiswaController::class, 'fileExport'])->name('file-export');
Route::get('/listmahasiswa', [MahasiswaController::class, 'listmahasiswa'])->name('listmahasiswa');

/* Tahap ROUTES */
Route::get('/listtahap', [TahapController::class, 'listtahap'])->name('listtahap');
Route::get('/tambahtahap', [TahapController::class, 'tambahTahap'])->name('tambahtahap');
Route::post('/tambahtahap-post', [TahapController::class, 'addTahap'])->name('tambahtahap.post');

/* MhsOrmawa ROUTES */
Route::get('/listmhsormawa', [MhsormawaController::class, 'listmhsormawa'])->name('listmhsormawa');
Route::get('/tambahmhsormawa', [MhsormawaController::class, 'tambahmhsormawa'])->name('tambahmhsormawa');
Route::post('/tambahmhsormawa-post', [MhsormawaController::class, 'addMhsormawa'])->name('tambahmhsormawa.post');