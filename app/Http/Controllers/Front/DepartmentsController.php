<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
   public function index(){
    $departments=Department::withCount('doctors')->get();
    return view('front.departments.index',[
        'departments' => $departments
    ]);
   }
   public function show(Department $department){
    if($department->status !='active') {
        abort(404);
    }
    return view('front.departments.show',[
        'department' => $department
    ]);

   }
}
