<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{

    public function index()
    {$request = request();
        $query = Medicine::query();
        $medicine_name = $request->query('medicine_name');
        $manufacturer = $request->query('manufacturer');
        $date_end = $request->query('date_end');

        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', $medicine_name);
        }
        if ($manufacturer) {
            $query->where('manufacturer', 'LIKE', $manufacturer);
        }
        if ($date_end) {
            $query->whereDate('date_end', '>=', $date_end);
        }
        $medicines = $query->paginate(10);

        return view('dashboard.medicines.index', [
            'medicines' => $medicines,
        ]);}

    public function create()
    {
        return view('dashboard.medicines.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate(Medicine::rulse());
        $medicine = Medicine::create($request->all());
        return redirect()->route('medicines.index')->with('success', 'medicine created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(Medicine $medicine)
    {
        return view('dashboard.medicines.create_edit', [
            'medicine' => $medicine,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Medicine::rulse());

        $medicine = Medicine::find($id);
        $medicine->update(attributes: $request->all());
        $medicine = Medicine::all();
        return redirect()->route('medicines.index')->with('info', 'updated successfully');

    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        $medicine = Medicine::all();
        return redirect()->route('medicines.index')->with('danger', 'deleted successfuly');

    }
}
