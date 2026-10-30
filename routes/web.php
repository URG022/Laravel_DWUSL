<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Pantalla de Inicio
Route::get('/', function () {
    return view('home');
});

//::::::PRODUCTS::::::::::

Route::middleware('auth')->group(function(){
    Route::get('products/create', [ProductController::class, 'create']);
    Route::get('products/edit/{product}', [ProductController::class, 'edit']);
});

Route::get('/products/show', [ProductController::class, 'index']);


Route::post('products/store', [ProductController::class, 'store']);

Route::put('products/update/{product}', [ProductController::class, 'update']);

Route::delete('products/destroy/{product}', [ProductController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');