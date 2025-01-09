<?php

use App\Http\Controllers\Front\AppoinmentsController;
use App\Http\Controllers\Front\DepartmentsController;
use App\Http\Controllers\Front\DoctorsController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/departments', [DepartmentsController::class, 'index'])->name('d.index');
Route::get('/departments/{department}', [DepartmentsController::class, 'show'])->name('d.show');
// doctors
Route::get('/doctors', [DoctorsController::class, 'index'])->name('doctor.index');
Route::get('/doctors/{doctor}', [DoctorsController::class, 'show'])->name('doctor.show');
//
Route::get('/appoinments/create', [AppoinmentsController::class, 'create'])->name('app.create');
Route::post('/appoinments/store', [AppoinmentsController::class, 'store'])->name('app.store');