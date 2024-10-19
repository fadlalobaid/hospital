<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable=[
        'department_id',
        'name',
        'birthday',
        'gander',
        'email',
        'phone',
        'language',
        'hours_work',
        
    ];


        public function department()
        {
            return $this->belongsTo(Department::class,'department_id','id');
        }
        public function doctors()
        {
            return $this->belongsToMany(Doctor::class, 'doctor_nurse');
        }
        public function patients()
    {
        return $this->belongsToMany(Patient::class, 'nurse_patient');
    }
}
