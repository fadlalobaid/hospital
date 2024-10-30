<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    use HasFactory;
    protected $fillable = [
        'date_report',
        'time_report',
        'doctor_id',
        'patient_id',
        'report',
    ];

    public static function rules()
    {
        return [
            'date_report' => 'required|date',
            'time_report' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'report' => 'required',
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

}
