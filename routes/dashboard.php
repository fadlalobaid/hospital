<?php


use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorsController;
use App\Http\Controllers\Dashboard\MedicinesController;
use App\Http\Controllers\Dashboard\NursesController;
use App\Http\Controllers\Dashboard\PatientsController;
use App\Http\Controllers\Dashboard\PrescriptionsController;
use App\Http\Controllers\Dashboard\ReportsController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\DashboardController;
;
use Illuminate\Support\Facades\Route;

// Route::resource('/dashboard/doctors',DoctorsController::class)->middleware(middleware: 'auth');

//
Route::group(
    [
        'middleware' => ['auth']
    ],
    function () {
        Route::get('/dashboard/index',[DashboardController::class,'index'])->name('dashboard.index');
        Route::resource('/dashboard/doctors', DoctorsController::class);
        Route::resource('/dashboard/departemnts', DepartmentsController::class);
        Route::resource('/dashboard/patients', PatientsController::class);
        Route::resource('/dashboard/nurses', NursesController::class);
        Route::resource('/dashboard/medicines', MedicinesController::class);
        Route::resource('dashboard/prescriptions', PrescriptionsController::class);
        Route::resource('dashboard/reports', ReportsController::class);
        Route::resource('dashboard/services', ServiceController::class);
    }
);
//
