<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
       return view('dashboard.services.index',[
        'department'=>Department::all(),
        'services'=>Service::paginate(7),

       ]);
    }


    public function create()
    {
      return view('dashboard.services.create_edit',[
        'departments'=>Department::all(),
      ]);
    }


    public function store(Request $request)
    {
        $request->validate(Service::rules());
        $service = Service::create($request->all());
        return redirect()->route('services.index')->with('success','added successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit(Service $service)
    {
        return view('dashboard.services.create_edit',[
            'service'=>$service,
            'departments'=>Department::all()
        ]);

    }


    public function update(Request $request, $id)
    {
       $request->validate(Service::rules());
       $service=Service::find($id);
       $service->update($request->all());
       $service=Service::all();
       return redirect()->route('services.index')->with('info','updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $service=Service::find($id);
      $service->delete();
      $service=Service::all();
      return redirect()->route('services.index')->with('danger','deleted successfuly');
    }
}
