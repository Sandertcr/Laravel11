<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('/welcome', function () {
    return view('layouts.app');
});


//Projects route
Route::get('/admin/projects/{project}/delete', [ProjectController::class, 'delete'])->name('projects.delete');
/*Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('projects.store');*/

Route::resource('admin/projects', ProjectController::class);

Route::get('projects', [App\Http\Controllers\Open\ProjectController::class, 'index'])->name('open.projects.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
