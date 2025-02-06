<?php

use App\Http\Controllers\ServiceRepository\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('service-repository', [PostController::class, 'index'])->name('sr.index');
Route::post('service-repository/create', [PostController::class, 'create'])->name('sr.create');
Route::delete('service-repository/{id}/delete', [PostController::class, 'delete'])->name('sr.delete');
Route::put('service-repository/{id}/update', [PostController::class, 'update'])->name('sr.update');
