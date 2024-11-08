<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;

class DoctorsController extends Controller
{

    public function index()
    {

        $request = request();
        $query = Doctor::query();
        $name = $request->query('name');
        $spec = $request->query('specialization');
        $country = $request->query('country');
        $gander = $request->query('gander');
        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($spec) {
            $query->where('specialization', 'LIKE', "%{$spec}%");
        }
        if ($country) {
            $query->where('country', 'LIKE', "%{$country}%");
        }
        if ($gander) {
            $query->whereGander($gander);
        }
        $doctors = $query->with(['department'])->paginate(5);
        // $doctors = Doctor::with(['department'])->paginate(7);
        return view('dashboard.doctors.index', [
            'doctors' => $doctors,
            'countries' => Countries::getNames(2),
        ]);
    }

    public function create()
    {

        $departments = Department::all();
        return view('dashboard.doctors.create_edit', [
            'departments' => $departments,
            // 'users' => User::all(),
            'countries' => Countries::getNames(),

        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Doctor::rules());
        $doctors = Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    public function show(Doctor $doctor)
    {
        $doctor->reports();
        return view('dashboard.doctors.show', ['doctor' => $doctor]);
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        return view('dashboard.doctors.create_edit', [
            'doctor' => $doctor,
            'departments' => $departments,
            // 'users' => User::all(),
            'countries' => Countries::getNames(),

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Doctor::rules());
        $doctors = Doctor::find($id);
        $doctors->update($request->all());
        $doctors = Doctor::all();
        return redirect()->route('doctors.index')
            ->with('info', 'Doctor update successfuly');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        $doctor = Doctor::all();
        return redirect()->route('doctors.index')
            ->with('danger', 'Doctor Delete successfuly');
    }
}
