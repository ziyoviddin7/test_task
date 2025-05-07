<?php

use App\Http\Controllers\API\V1\Auth\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->middleware(['throttle:api'])->group(function() {
    Route::post('register', [ApiAuthController::class, 'register'])->name('api.register');
    Route::post('login', [ApiAuthController::class, 'login'])->name('api.login');;
});
