<?php

use App\Http\Controllers\StepsController;
use Illuminate\Support\Facades\Route;

Route::get('', [StepsController::class, 'steps'])->name('index');
Route::get('create', [StepsController::class, 'create'])->name('create');
Route::post('store', [StepsController::class, 'store'])->name('store');
Route::get('show/{step}', [StepsController::class, 'show'])->name('show');
Route::get('edit/{step}', [StepsController::class, 'edit'])->name('edit');
Route::put('update/{step}', [StepsController::class, 'update'])->name('update');
Route::delete('delete/{step}', [StepsController::class, 'delete'])->name('delete');
