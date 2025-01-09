<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
        'department_id',
        'patient_name',
        'doctor_id',
        'time_appointment',
        'date_appointment',
        'status',
        'notes',
    ];
    public static function rules(){
        return [
            'department_id'=>'required|exists:departments,id',
            'patient_name'=>'required',
            'doctor_id'=>'required|exists:doctors,id',
            'time_appointment'=>'required',
            'date_appointment'=>'required',
            'status'=>'in:confirmed,pending,cancelled',
            'notes'=>'required|min:5|max:500',
        ];
    }
    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function doctors(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
   
}
