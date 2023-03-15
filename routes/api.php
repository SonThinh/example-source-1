<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\User\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//CMS
Route::middleware('cms_locale')->group(function () {
    Route::prefix('cms')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::middleware('auth:admin')->group(function () {
            Route::get('me', [AuthController::class, 'profile']);
            Route::delete('logout', [AuthController::class, 'logout']);
        });
    });
});

// User
Route::prefix('user')->group(function () {
    Route::get('questions', [QuestionController::class, 'index']);
});
