<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppoinmentsController extends Controller
{
    public function create()
    {
        return view('front.appoinments.create', [
            'departments' => Department::all(),
            'doctors' => Doctor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Appointment::rules());
        $app = Appointment::create($request->all());
        return redirect()->back()->with('success', 'added successfully');
    }

}
