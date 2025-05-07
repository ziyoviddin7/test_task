<?php

use App\Http\Controllers\API\V1\ApiTagController;
use App\Http\Controllers\API\V1\ApiTaskController;
use App\Http\Controllers\API\V1\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')->middleware(['throttle:api'])->group(function() {
    Route::post('register', [ApiAuthController::class, 'register'])->name('api.register');
    Route::post('login', [ApiAuthController::class, 'login'])->name('api.login');;
});


Route::prefix('/v1')->middleware('api.token')->group(function () {
    Route::get('/tasks', [ApiTaskController::class, 'index'])->name('task.index');
    Route::get('/task/{task}', [ApiTaskController::class, 'show'])->name('task.show');
    Route::post('/new_task', [ApiTaskController::class, 'store'])->name('task.store');
    Route::patch('/task/{task}', [ApiTaskController::class, 'edit'])->name('task.edit');
    Route::delete('/task/{task}', [ApiTaskController::class, 'destroy'])->name('task.destroy');
    
    Route::get('/tags', [ApiTagController::class, 'index'])->name('tag.index');
    Route::get('/tag/{tag}', [ApiTagController::class, 'show'])->name('tag.show');
    Route::post('/new_tag', [ApiTagController::class, 'store'])->name('tag.store');
    Route::patch('/tag/{tag}', [ApiTagController::class, 'edit'])->name('tag.edit');
    Route::delete('/tag/{tag}', [ApiTagController::class, 'destroy'])->name('tag.destroy');
});