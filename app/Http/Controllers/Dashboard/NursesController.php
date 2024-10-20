<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Nurse;
use Illuminate\Http\Request;

class NursesController extends Controller
{

    public function index()
    {

        $nurses=Nurse::with('department')
        ->paginate(7);
        return view('dashboard.nurses.index',[
            'nurses' => $nurses,

        ]) ;

    }


    public function create()
    {

        return view('dashboard.nurses.create_edit',[

            'departments'=>Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Nurse::rules());
        $nurses=Nurse::create($request->all());
        return redirect()->route('nurses.index')->with('success','nurses created successfully');

    }


    public function show($id)
    {

    }


    public function edit(Nurse $nurse){

        return view('dashboard.nurses.create_edit',[
            'nurse'=>$nurse,
            'departments'=>Department::all(),
        ]);
    }





    public function update(Request $request, $id)
    {
        $request->validate(Nurse::rules());
        $nurses=Nurse::find($id);
        $nurses->update($request->all());
        $nurses=Nurse::all();
        return redirect()->route('nurses.index')->with('info','Nurse data has been updated ');


    }

    public function destroy($id)
    {
        $nurse=Nurse::find($id);
        $nurse->delete();
        $nurse=Nurse::all();
        return redirect()->route('nurses.index')->with('danger','Nurse data has been deleted');

    }
}
