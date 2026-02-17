<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::resource('producto', ProductoController::class);
