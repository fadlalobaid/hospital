<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'recipe_name',
        'recipe_date',
        'instructions',
    ];

    public static function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'recipe_name' => 'required|string|min:3|max:25',
            'recipe_date' => 'required',
            'instructions' => 'required',
        ];
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    public function medications()
    {
        return $this->belongsToMany(Medicine::class, 'medication_prescription');
    }
}
