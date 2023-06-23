<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('task.task');
});

Route::get('/task', [TaskController::class, 'index'])->name('task');
Route::get('/create_task', [TaskController::class, 'create_task'])->name('create_task');
Route::post('/simpan_task', [TaskController::class, 'store'])->name('simpan_task');
Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('tasks/edit/{id}/', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
