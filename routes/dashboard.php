<?php

use App\Http\Controllers\Dashboard\AddressdController;
use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorsController;
use App\Http\Controllers\Dashboard\MedicinesController;
use App\Http\Controllers\Dashboard\NursesController;
use App\Http\Controllers\Dashboard\PatientsController;
use App\Http\Controllers\Dashboard\PrescriptionsController;
use Illuminate\Support\Facades\Route;

// Route::resource('/dashboard/doctors',DoctorsController::class)->middleware(middleware: 'auth');
Route::resource('/dashboard/doctors',DoctorsController::class)->middleware('auth');
Route::resource('/dashboard/departemnts',DepartmentsController::class)->middleware('auth');
Route::resource('/dashboard/patients',PatientsController::class)->middleware('auth');
Route::resource('/dashboard/nurses',NursesController::class)->middleware('auth');
Route::resource('/dashboard/medicines',MedicinesController::class)->middleware('auth');
Route::resource('dashboard/prescriptions',PrescriptionsController::class)->middleware('auth');
//
