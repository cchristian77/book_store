<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
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

    Route::prefix('genre')->group(function () {
        Route::get('', [GenreController::class, 'index'])->name('api.genre.index');
        Route::get('{id}', [GenreController::class, 'show'])->name('api.genre.show');

        // Only Admin can CREATE, UPDATE, DELETE Genre
        Route::group(['middleware' => 'admin'], function () {
            Route::post('', [GenreController::class, 'store'])->name('api.genre.store');
            Route::put('{id}', [GenreController::class, 'update'])->name('api.genre.update');
            Route::delete('{id}', [GenreController::class, 'delete'])->name('api.genre.delete');
        });
    });

    Route::prefix('book')->group(function () {
        Route::get('', [BookController::class, 'index'])->name('api.book.index');
        Route::get('{id}', [BookController::class, 'show'])->name('api.book.show');

        // Only Admin can CREATE, UPDATE, DELETE Book
        Route::group(['middleware' => 'admin'], function () {
            Route::post('', [BookController::class, 'store'])->name('api.book.store');
            Route::post('{id}', [BookController::class, 'update'])->name('api.book.update');
            Route::delete('{id}', [BookController::class, 'delete'])->name('api.book.delete');
        });
    });

    // Only Admin can manage user
    Route::group(['middleware' => 'admin', 'prefix' => 'user-management'], function () {
        Route::get('', [UserController::class, 'index'])->name('api.user-management.index');
        Route::get('{id}', [UserController::class, 'show'])->name('api.user-management.show');
        Route::put('{id}', [UserController::class, 'update'])->name('api.user-management.update');
        Route::delete('{id}', [UserController::class, 'delete'])->name('api.user-management.delete');
    });
});

