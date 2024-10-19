<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function index()
    { $patients=Patient::all();
       return view('dashboard.patients.index',['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('dashboard.patients.create_edit',);
    }


    public function store(Request $request)
    {
        $request->validate(Patient::rules());
        $patients=new Patient(
            $request->all()
        );
        $patients->save();
        return redirect()->route('patients.index',[
            'patients'=>$patients
        ])->with('sucess', 'Patient created successfully');
    }

  
    public function show($id)
    {

    }


    public function edit(Patient $patient)
    {

return view('dashboard.patients.create_edit',[
    'patient' => $patient
]);

    }


    public function update(Request $request, $id)
    {
        $request->validate(Patient::rules());
        $patients = Patient::find($id);
        $patients->update($request->all());
        $patients = Patient::all();
        return redirect()->route('patients.index', compact('patients'))
        ->with('info', 'patients updated seccessfuly');

    }


    public function destroy($id)
    {
      $patient=Patient::find($id);
      $patient->delete();
      $patients=Patient::all();
      return redirect()->route('patients.index',[
       'patients'=>$patients
      ])->with('danger','patient deleted successfully');

    }
}
