<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/section', [SectionController::class, 'index'])->name('section.section');
Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
Route::post('/section', [SectionController::class, 'store'])->name('section.store');
Route::get('/section/{section}/edit', [SectionController::class, 'edit'])->name('section.edit');
Route::put('/section/{section}/update', [SectionController::class, 'update'])->name('section.update');
Route::delete('/section/{section}/delete', [SectionController::class, 'delete'])->name('section.delete');

Route::get('/register', [AuthController::class, 'register'])->name('authentication.register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('authentication.registerSubmit');
Route::get('/login', [AuthController::class, 'login'])->name('authentication.login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('authentication.loginAttempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('authentication.logout');