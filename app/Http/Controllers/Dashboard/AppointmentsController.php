<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{

    public function index()
    {
        return view('dashboard.appointments.index', [
            'appointments' => Appointment::paginate(7),
        ]);
    }

    public function create()
    {
        $departmets = Department::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('dashboard.appointments.create_edit', [
            'departments' => $departmets,
            'doctors' => $doctors,
            'patients' => $patients,
        ]);
    }

    public function store(Request $request)
    {
      $request->validate(Appointment::rules());
      $app=Appointment::create($request->all());
      return redirect()->route('appointments.index')->with('success','added successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit(Appointment $appointment)
    {

        $departmets = Department::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('dashboard.appointments.create_edit', [
            'appointment'=>$appointment,
            'departments' => $departmets,
            'doctors' => $doctors,
            'patients' => $patients,
        ]);
    }


    public function update(Request $request, $id)
    {
       $request->validate(Appointment::rules());
       $app=Appointment::find($id);
       $app->update($request->all());
       $app=Appointment::all();
       return redirect()->route('appointments.index')->with('info','updated successfully');
    }


    public function destroy($id)
    {
        $app=Appointment::find($id);
        $app->delete();
        $app=Appointment::all();
        return redirect()->route('appointments.index')->with('danger','deleted successfully');

    }
}
