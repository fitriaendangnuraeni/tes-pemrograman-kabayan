<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/category', [CategoryController::class, "index"]);
Route::get('/category/create', [CategoryController::class, "create"]);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/transaction', [TransactionController::class, "index"]);
Route::get('/transaction/precreate', [TransactionController::class, "precreate"]);
Route::post('/transaction/create', [TransactionController::class, "create"]);
Route::post('/transaction/store/{id}', [TransactionController::class, 'store']);
Route::post('/transaction/payment/{id}', [TransactionController::class, 'payment']);
Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit']);
Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);
