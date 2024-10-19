<?php

use App\Http\Controllers\Dashboard\AddressdController;
use App\Http\Controllers\Dashboard\DepartmentsController;
use App\Http\Controllers\Dashboard\DoctorsController;
use App\Http\Controllers\Dashboard\PatientsController;
use Illuminate\Support\Facades\Route;

// Route::resource('/dashboard/doctors',DoctorsController::class)->middleware(middleware: 'auth');
Route::resource('/dashboard/doctors',DoctorsController::class)->middleware('auth');
Route::resource('/dashboard/departemnts',DepartmentsController::class)->middleware('auth');
Route::resource('/dashboard/patients',PatientsController::class)->middleware('auth');
Route::get('/dashboard/address/edit',[AddressdController::class, 'edit'])->name('d.address.edit');
Route::patch('/dashboard/doctors/address/upadte',[AddressdController::class, 'update'])->name('d.address.update');
//
