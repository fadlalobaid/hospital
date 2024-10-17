<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{


    public function index()
    {
        $departments = department::paginate(10);
        return view('dashboard.departments.index',['departments' => $departments]);

    }


    public function create()
    {
        return view('dashboard.departments.create_edit');
    }


    public function store(Request $request)
    {
        $request->validate(Department::rules());
        $depatment=new Department($request->all());
        $depatment->save();
        return redirect()->route('departemnts.index')->with('success',"departemnt created successfully");

    }


    public function show($id) {}


    public function edit(Department $department)
    {
        return view('dashboard.departments.create_edit', [
            'department' => $department
        ]);
    }


    public function update(Request $request, $id) {
        $request->validate(Department::rules());
        $department=Department::find($id);
        $department->update($request->all());
        $departments=Department::all();
        return redirect()->route('departemnts.index',[
            'departments' => $departments
        ])
        ->with('info',"Departments Updated Success");
    }

    public function destroy($id) {
        $department=Department::find($id);
        $department->delete();
       return redirect()->route('departemnts.index')
       ->with('danger', 'Departments deleted successfully');
    }
}
