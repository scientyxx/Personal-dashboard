<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('task.task');
});
// Route::get('/task', 'TaskController@index')->name('task');
// Route::get('/creat_task', 'TaskController@create')->name('create_task');

use App\Http\Controllers\TaskController;

Route::get('/task', [TaskController::class, 'index']);
Route::get('/create_task', [TaskController::class, 'create_task']);
Route::post('/simpan_task', [TaskController::class, 'store'])->name('simpan_task');
Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

// or
// Route::get('/users', 'App\Http\Controllers\UserController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
