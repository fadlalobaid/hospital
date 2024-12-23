<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
public function index(){
    $doctors=Doctor::all();
    return view('front.doctors.index',[
        'doctors' => $doctors
    ]);
}
}
