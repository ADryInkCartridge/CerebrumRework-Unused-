<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::view('/', 'testing')->name('testing');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class, 'landing'])->name('landing');
Route::get('/admin',[adminController::class, 'index'])->name('admin');
Route::get('/testing',[HomeController::class, 'testing'])->name('testing');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
