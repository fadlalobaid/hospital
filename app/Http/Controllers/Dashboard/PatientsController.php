<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Patient;
use App\Models\User;
use Symfony\Component\Intl\Countries;

use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function index()
    {
        $request = request();
        $query = Patient::query();
        $name = $request->query('name');
        $country = $request->query('country');
        $gander = $request->query('gander');

        if($name){
            $query->where('name','LIKE',$name);
        }
        if($country){
            $query->where('country','LIKE',$country);
        }
        if($gander){
            $query->whereGander($gander);
        }
        $patients = $query->paginate(10);
        return view('dashboard.patients.index', [
            'patients' => $patients,
            'countries' => Countries::getNames(1)

        ]);
    }


    public function create()
    {
        return view('dashboard.patients.create_edit', [
            'departments' => Department::all(),
            // 'users' => User::all(),
            'countries' => Countries::getNames()

        ]);
    }


    public function store(Request $request)
    {
        $request->validate(Patient::rules());
        $patients = new Patient(
            $request->all()
        );
        $patients->save();
        return redirect()->route('patients.index', [
            'patients' => $patients
        ])->with('success', 'created successfully');
    }


    public function show(Patient $patient)
    {
        $patient->reprots();
        return view('dashboard.patients.show', [
            'patient' => $patient
        ]);
    }


    public function edit(Patient $patient)
    {

        return view('dashboard.patients.create_edit', [
            'patient' => $patient,
            'departments' => Department::all(),
            // 'users' => User::all(),
            'countries' => Countries::getNames()
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Patient::rules());
        $patients = Patient::find($id);
        $patients->update($request->all());
        $patients = Patient::all();
        return redirect()->route('patients.index', compact('patients'))
            ->with('info', 'updated seccessfuly');
    }


    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        $patients = Patient::all();
        return redirect()->route('patients.index', [
            'patients' => $patients
        ])->with('danger', 'deleted successfully');
    }
}
