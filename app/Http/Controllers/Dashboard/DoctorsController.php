<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Symfony\Component\Intl\Countries;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with(['department'])->paginate(7);
        return view('dashboard.doctors.index', [
            'doctors' => $doctors
        ]);
    }


    public function create()
    {
        $countries = Countries::getNames();
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('dashboard.doctors.create_edit', [
            'departments' => $departments,
            'doctors' => $doctors,
            'countries'=>$countries
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(Doctor::rules());
        $doctors = Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        return view('dashboard.doctors.create_edit', [
            'doctor' => $doctor,
            'departments' => $departments
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Doctor::rules());
        $doctors = Doctor::find($id);
        $doctors->update($request->all());
        $doctors = Doctor::all();
        return redirect()->route('doctors.index', [
            'doctors' => $doctors
        ])
            ->with('info', 'Doctor update successfuly');
    }


    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        $doctor = Doctor::all();
        return redirect()->route('doctors.index', [
            'doctor' => $doctor
        ])
            ->with('danger', 'Doctor Delete successfuly');
    }
}
