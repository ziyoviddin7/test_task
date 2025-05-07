<?php

use App\Http\Controllers\API\V1\Auth\ApiAuthController;
use App\Http\Controllers\API\V1\TagController;
use App\Http\Controllers\API\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->middleware(['throttle:api'])->group(function() {
    Route::post('register', [ApiAuthController::class, 'register'])->name('api.register');
    Route::post('login', [ApiAuthController::class, 'login'])->name('api.login');;
});


Route::prefix('/v1')->middleware('api.token')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::post('/new_task', [TaskController::class, 'store'])->name('task.store');
    Route::patch('/task/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
    
    Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/{tag}', [TagController::class, 'show'])->name('tag.show');
    Route::post('/new_tag', [TagController::class, 'store'])->name('tag.store');
    Route::patch('/tag/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::delete('/tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
});