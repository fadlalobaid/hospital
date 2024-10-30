<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Report;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function index()
    {
        return view('dashboard.reports.index',[
            'doctors'=>Doctor::all(),
            'patients'=>Patient::all(),
            'reports'=>Report::paginate(),

        ]);
    }

    public function create()
    {
        return view('dashboard.reports.create_edit',[
            'doctors'=>Doctor::all(),
            'patients'=>Patient::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Report::rules());
        $report=Report::create($request->all());
        return redirect()->route('reports.index')->with('success','create successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Report $report)
    {
        return view('dashboard.reports.create_edit',[
            'read' => $report,
            'doctors'=>Doctor::all(),
            'patients'=>Patient::all(), 

        ]);
    }


    public function update(Request $request, $id)
    {
     $request->validate(Report::rules());
     $report=Report::find($id);
     $report->update($request->all());
     $report=Report::all();
     return redirect()->route('reports.index')->with('info', 'updated successfully');
    }


    public function destroy($id)
    {
     $report=Report::find($id);
     $report->delete();
     $report=Report::all();
     return redirect()->route('reports.index')->with('danger', 'deleted successfully');
    }
}
