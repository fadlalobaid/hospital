<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $table = "doctors";
    use HasFactory;
    protected $fillable = [
        'department_id',
        'name',
        'birthday',
        'Graduation_date',
        'gender',
        'Specialization',
        'email',
        'image',
        'discription',
        'phone',
        'languege',
        'hours_worked',
    ];

    public static function rules()
    {
        return [
            'department_id' => 'required|exists:departments,id',
            'discription'=>'required',
            'name' => 'required|String|min:3|max:24',
            // 'birthday' => 'required|date',
            // 'Graduation_date' => 'required|date',
            'gender' => 'in:male,female',
            'Specialization' => 'required|String|min:3|max:50',
            'email' => 'required|email',
            // 'phone' => 'required|number|min:9|max:15',
            // 'languege' => 'required',
            // 'hours_worked' => 'required',
            // 'image' => 'required'

        ];
    }
    public function addressD()
    {
        return $this->hasOne(doctor::class, 'doctor_id', 'id')->withDefault();
    }
    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function patients(){
        return $this->belongsToMany(Patient::class);
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class,'doctor_id','id');
    }
    public function nurses()
    {
        return $this->belongsToMany(Nurse::class, 'doctor_nurse');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'doctor_id','id');
    }
}
