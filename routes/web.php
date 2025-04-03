<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('tasks.index'); // Redirect to the task list
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::get('/tasks/trash', [TaskController::class, 'trash'])->name('tasks.trash');
Route::post('/tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
