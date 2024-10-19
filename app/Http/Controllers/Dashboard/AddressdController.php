<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\address_doctor;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;

class AddressdController extends Controller
{
public function edit(){
    $doctor=Doctor::all();
    $countries = Countries::getNames();
    return view('dashboard.doctors.address.index',[
        'doctor'=>$doctor,
        'countries'=>$countries

    ]);
}
public function update(Request $request){
    // $request->validate(address_doctor::rules());
    // $doctor=Auth::doctor();
    // $address=$doctor->addressD;
    // $doctor->addressD->update($request->all());
    $doctor=Auth::doctor();
    $doctor->addressD->fill($request->all())->save();
    return redirect()->route('dashboard.doctors.address.edit')->with('success', 'address updated successfully');
}
}
