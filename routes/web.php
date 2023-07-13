<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/tasks/{id}/update', [TaskController::class, 'update'])->name('task.update');


Route::fallback(function () {
   return redirect()->route('home');
});
