<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class,'index']);
Route::resource('producto', ProductoController::class);
