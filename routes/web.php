<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/detail/{id}', [BlogController::class, 'detail']);


//นักเขียน
Route::prefix('author')->group(function(){
    Route::get('/blog', [AdminController::class, 'index'])->name('blog');;
Route::get('/about', [AdminController::class, 'about'])->name('about');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
Route::get('/chang_status/{id}', [AdminController::class, 'chang_status'])->name('chang_status');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');;

});


Route::fallback(function () {
    return '<h1>Error Page</h1>';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
