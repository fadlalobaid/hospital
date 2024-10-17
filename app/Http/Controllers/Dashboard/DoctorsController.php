<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    public function index()
    {
        $patients=Patient::all();
       return view('dashboard.doctors.index',);
    }


    public function create()
    {
        $departments=Department::all();
        return view('dashboard.doctors.create_edit',[
            'departments' => $departments,
            'doctor'
        ]);
    }


    public function store(Request $request)
    {
       $request->validate(Doctor::rules());
       $doctors=new Doctor(
        $request->all()
       );
       $doctors->save();
       return redirect()->route('dashboard.doctors.index')->with('success','Doctor created successfully');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
