<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;


Auth::routes();

// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/Register', [LoginController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman tugas
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create_task', [TaskController::class, 'create_task'])->name('create_task');
    Route::post('/simpan_task', [TaskController::class, 'store'])->name('simpan_task');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Rute untuk profil pengguna
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');




    ;

});

Route::get('/', function () {
    return view('landing-page'); // Ganti 'landing-page' dengan nama file blade halaman landing page Anda
});
