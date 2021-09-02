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
Route::get('/listormawa', [AdminController::class, 'listormawa'])->name('listormawa');
Route::get('/tambahormawa', [AdminController::class, 'tambahormawa'])->name('tambahormawa');
Route::post('/tambahormawa/add', [AdminController::class, 'addOrmawa'])->name('tambahormawa.post');
Route::get('/ormawa/{id}/edit', [AdminController::class, 'editOrmawa'])->name('ormawa.edit');
Route::post('/ormawa/update', [AdminController::class, 'updateOrmawa'])->name('ormawa.update');
Route::post('/ormawa/{id}/delete', [AdminController::class, 'deleteOrmawa'])->name('ormawa.delete');
Route::get('/listpanitia', [AdminController::class, 'listpanitia'])->name('listpanitia');
Route::get('/tambahpanitia', [AdminController::class, 'tambahpanitia'])->name('tambahpanitia');
Route::post('/tambahpanitia/add', [AdminController::class, 'addPanitia'])->name('tambahpanitia.post');
Route::get('/panitia/{id}/edit', [AdminController::class, 'editpanitia'])->name('panitia.edit');
Route::post('/panitia/update', [AdminController::class, 'updatepanitia'])->name('panitia.update');
Route::post('/panitia/{id}/delete', [AdminController::class, 'deletePanitia'])->name('panitia.delete');

/* Ormawa ROUTES */
Route::get('/ormawa',[OrmawaController::class, 'index'])->name('ormawa');
Route::get('/nilaiormawa/{id}',[OrmawaController::class, 'nilaiOrmawa'])->name('nilaiOrmawa');
Route::get('/nilaiormawa/{id_ormawa}/{id_kegiatan}',[OrmawaController::class, 'tambahNilai'])->name('tambahNilaiOrmawa');
Route::post('/nilaiormawa/post',[OrmawaController::class, 'addNilai'])->name('tambahnilaiormawa.post');
Route::get('/tambahkegiatan', [OrmawaController::class, 'tambahkegiatan'])->name('tambahkegiatan');
Route::get('/editkegiatan', [OrmawaController::class, 'editkegiatan'])->name('editkegiatan');
Route::get('/listkegiatan', [OrmawaController::class, 'listkegiatan'])->name('listkegiatan');
Route::get('/tambahkegiatan/post', [OrmawaController::class, 'addKegiatan'])->name('tambahkegiatan.post');
Route::get('/kegiatan/{id}/edit', [OrmawaController::class, 'editKegiatan'])->name('kegiatan.edit');


/* Mahasiswa ROUTES */
Route::get('file-import-export', [MahasiswaController::class, 'fileImportExport']);
Route::post('file-import', [MahasiswaController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [MahasiswaController::class, 'fileExport'])->name('file-export');
Route::get('/listmahasiswa', [MahasiswaController::class, 'listmahasiswa'])->name('listmahasiswa');

/* Tahap ROUTES */
Route::get('/listtahap', [TahapController::class, 'listtahap'])->name('listtahap');
Route::get('/tambahtahap', [TahapController::class, 'tambahTahap'])->name('tambahtahap');
Route::post('/tambahtahap-post', [TahapController::class, 'addTahap'])->name('tambahtahap.post');
Route::get('/tahap/{id}/edit', [TahapController::class, 'editTahap'])->name('tahap.edit');
Route::POST('/tahap/{id}/delete', [TahapController::class, 'deleteTahap'])->name('tahap.delete');
Route::POST('/tahap/update', [TahapController::class, 'updateTahap'])->name('tahap.update');

/* MhsOrmawa ROUTES */
Route::get('/listmhsormawa', [MhsormawaController::class, 'listmhsormawa'])->name('listmhsormawa');
Route::get('/tambahmhsormawa', [MhsormawaController::class, 'tambahmhsormawa'])->name('tambahmhsormawa');
Route::post('/tambahmhsormawa-post', [MhsormawaController::class, 'addMhsormawa'])->name('tambahmhsormawa.post');

/* Panitia ROUTES */
Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia');
Route::get('/listtahappanitia', [PanitiaController::class, 'listtahappanitia'])->name('listtahappanitia');