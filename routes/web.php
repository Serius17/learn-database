<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/insert', [BookController::class, 'insert']);
Route::get('/update', [BookController::class, 'update']);
Route::get('/delete', [BookController::class, 'delete']);
Route::get('/select', [BookController::class, 'select']);


Route::prefix('/selling')->group(function () {
    Route::get('/select', [SelllingController::class, 'select']);
    Route::get('/update', [SelllingController::class, 'update']);
    Route::get('/delete', [SelllingController::class, 'delete']);
    Route::get('/insert', [SelllingController::class, 'insert']);
});


Route::prefix('/author')->group(function () {
    Route::get('/select', [AuthorController::class, 'select']);
    Route::get('/update', [AuthorController::class, 'update']);
    Route::get('/delete', [AuthorController::class, 'delete']);
    Route::get('/insert', [AuthorController::class, 'insert']);
});

Route::get('/dissociate', [BookController::class, 'dissociate']);


Route::get('/attach', [CategoryController::class, 'attach']);
Route::get('/sync', [CategoryController::class, 'sync']);
