<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{

    public function index()
    {
        return view('dashboard.prescriptions.index',[
            'doctors'=>Doctor::all(),
            'patients'=>Patient::all(),
            'prescriptions'=>Prescription::paginate(7)
        ]);

    }


    public function create()
    {
       return view('dashboard.prescriptions.create_edit',[
        'doctors'=>Doctor::all(),
        'patients'=>Patient::all(),
       ]);
    }


    public function store(Request $request)
    {
       $request->validate(Prescription::rules());
       $Prescriptions=Prescription::create($request->all());
       return redirect()->route('prescriptions.index')->with('success','Prescription created successfully');

    }


    public function show($id)
    {

    }


    public function edit(Prescription $prescription)
    {
       return view('dashboard.prescriptions.create_edit',[
        'prescription'=>$prescription,
        'doctors'=>Doctor::all(),
        'patients'=>Patient::all(),
       ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(Prescription::rules());
        $prescriptions=Prescription::find($id);
        $prescriptions->update($request->all());
        $prescriptions=Prescription::all();
        return redirect()->route('prescriptions.index')->with('info','Prescription Updated successfully');
    }


    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        $prescriptions=Prescription::all();
        return redirect()->route('prescriptions.index')->with('danger','prescription deleted successfully');

    }
}
