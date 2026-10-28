<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/praktikum/mahasiswa', [StudentController::class, 'index'])
    ->name('praktikum.mahasiswa');