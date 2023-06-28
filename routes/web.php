<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman tugas
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create_task', [TaskController::class, 'create_task'])->name('create_task');
    Route::post('/simpan_task', [TaskController::class, 'store'])->name('simpan_task');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


});

Route::get('/', function () {
    // Arahkan ke halaman login jika pengguna belum login
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // Arahkan ke halaman tugas jika pengguna sudah login
    return redirect()->route('task.index');
});
