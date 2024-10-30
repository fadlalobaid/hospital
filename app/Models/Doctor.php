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
        'user_id',
        'name',
        'specialization',
        'birthday',
        'gander',
        'email',
        'image',
        'phone',
        'country',
        'city',//
        'street',
    ];

    public static function rules()
    {
        return [
            'department_id' => 'required|exists:departments,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|String|min:3|max:24',
            'specialization'=>'required',
            'birthday'=>'required|date',
            'gander' => 'in:male,female',
            'email' => 'required|email',
            'phone'=>'required|min:9|max:16',
            'country'=>'required',
            'city'=>'required',
            'street'=>'required',




        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
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
    public function reports()
    {
        return $this->hasMany(Report::class,'doctor_id','id');
    }
}
