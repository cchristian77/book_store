<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', [AuthController::class, 'logout'])->name('api.auth.logout');

//    Route::prefix('publisher')->group(function () {
//     Route::get('', [PublisherController::class, 'index'])->name('api.publisher.index');
//    Route::get('{id}', [PublisherController::class, 'show'])->name('api.company-job-division.show');
//    Route::post('', [PublisherController::class, 'store'])->name('api.company-job-division.store');
//    Route::put('{id}', [PublisherController::class, 'update'])->name('api.company-job-division.update');
//    Route::delete('{id}', [PublisherController::class, 'delete'])->name('api.company-job-division.delete');
//    });
});

