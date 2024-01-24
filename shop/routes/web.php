<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('producto');
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/client', [ClientController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create']);
Route::get('/client/create', [ClientController::class, 'create']);
//Route::post('/product/store', [ProductController::class, 'store']);

Route::group(['middleware' => ['cors']], function () {
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::post('/client/add', [ClientController::class, 'add']);
    
    Route::delete('/product/{id}', [ProductController::class, 'delete']);
    Route::delete('/client/{id}', [ClientController::class, 'delete']);

    Route::patch('/product/edit/{id}', [ProductController::class, 'update']);
    Route::patch('/client/edit/{id}', [ClientController::class, 'update']);

    Route::patch('/product/replace/{id}', [ProductController::class, 'replace']);
    Route::patch('/client/replace/{id}', [ClientController::class, 'replace']);
    
});

Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
//Route::patch('/product/{id}', [ProductController::class, 'update']);
//Route::delete('/product/{id}', [ProductController::class, 'delete']);
