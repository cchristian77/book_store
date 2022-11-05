<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

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

Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
Route::post('register', [AuthController::class, 'register'])->name('api.auth.register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('api.auth.logout');
    Route::post('user-token', [AuthController::class, 'userToken'])->name('api.auth.user-token');

    Route::prefix('publisher')->group(function () {
        Route::get('', [PublisherController::class, 'index'])->name('api.publisher.index');
        Route::get('{id}', [PublisherController::class, 'show'])->name('api.publisher.show');

        // Only Admin can CREATE, UPDATE, DELETE Publisher
        Route::group(['middleware' => 'admin'], function () {
            Route::post('', [PublisherController::class, 'store'])->name('api.publisher.store');
            Route::put('{id}', [PublisherController::class, 'update'])->name('api.publisher.update');
            Route::delete('{id}', [PublisherController::class, 'delete'])->name('api.publisher.delete');
        });
    });

    Route::prefix('publisher')->group(function () {
        Route::get('', [PublisherController::class, 'index'])->name('api.publisher.index');
        Route::get('{id}', [PublisherController::class, 'show'])->name('api.publisher.show');

        // Only Admin can CREATE, UPDATE, DELETE Publisher
        Route::group(['middleware' => 'admin'], function () {
            Route::post('', [PublisherController::class, 'store'])->name('api.publisher.store');
            Route::put('{id}', [PublisherController::class, 'update'])->name('api.publisher.update');
            Route::delete('{id}', [PublisherController::class, 'delete'])->name('api.publisher.delete');
        });
    });

    Route::prefix('author')->group(function () {
        Route::get('', [AuthorController::class, 'index'])->name('api.author.index');
        Route::get('{id}', [AuthorController::class, 'show'])->name('api.author.show');

        // Only Admin can CREATE, UPDATE, DELETE Author
        Route::group(['middleware' => 'admin'], function () {
            Route::post('', [AuthorController::class, 'store'])->name('api.author.store');
            Route::post('{id}', [AuthorController::class, 'update'])->name('api.author.update');
            Route::delete('{id}', [AuthorController::class, 'delete'])->name('api.author.delete');
        });
    });
});

