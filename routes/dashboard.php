<?php

use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorsController;
use App\Http\Controllers\Dashboard\PatientsController;
use Illuminate\Support\Facades\Route;

// Route::resource('/dashboard/doctors',DoctorsController::class)->middleware(middleware: 'auth');
Route::resource('/dashboard/doctors',DoctorsController::class)->middleware('auth');
Route::resource('/dashboard/departemnts',DepartmentsController::class)->middleware('auth');
Route::resource('/dashboard/patients',PatientsController::class)->middleware('auth');

//
