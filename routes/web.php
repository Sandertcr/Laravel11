<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Auth\Middleware\Authorize;
use App\Providers\RouteServiceProvider;

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('/welcome', function () {
    return view('layouts.app');
});


//Projects route
///*Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('projects.create');
//Route::post('/admin/projects', [ProjectController::class, 'store'])->name('projects.store');*/


Route::group(['middleware' => ['role:student|teacher|admin']], function () {
    Route::get('/admin/projects/{project}/delete', [ProjectController::class, 'delete'])->name('projects.delete')->middleware(['role:teacher|admin']);
    Route::resource('admin/projects', ProjectController::class);
    //Route::get('projects', [App\Http\Controllers\Open\ProjectController::class, 'index'])->name('open.projects.index');

});


Route::get('/home', function () {
    return view('layouts.layoutpublic')->with(['status' => "hello world"]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
