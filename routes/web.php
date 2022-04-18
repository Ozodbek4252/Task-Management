<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::resource([
    'projects' => ProjectController::class,
    'tasks' => TaskController::class
]);

// Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
// Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
// Route::get('/projects/edit', [ProjectController::class, 'edit'])->name('projects.edit');
// Route::put('/projects', [ProjectController::class, 'update'])->name('projects.update');
