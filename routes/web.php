<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('estudiante', EstudianteController::class);