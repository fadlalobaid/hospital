<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;

class HomeController extends Controller
{

    public function index()
    {
        $departments = Department::where('status', 'active')
            ->latest()
            ->take(4)
            ->get();
        $doctors = Doctor::latest()
            ->take(4)
            ->get();
        $services=Service::latest()
        ->take(5)
        ->get();
        return view('front.home', [
            'departments' => $departments,
            'doctors'=>$doctors,
            'services'=>$services
        ]);
    }

}
