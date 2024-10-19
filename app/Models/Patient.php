<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'birthday',
        'gander',
        'number_phone',
        'email',
        'image',
    ];
    public static function rules(){
        return [
            'name'=>'required|min:3|max:20',
            'birthday'=>'required',
            'gander'=>'in:male,female',
            'number_phone'=>'required',
            'email'=>'required',
            // 'image',
        ];
    }
    public function addressP(){
        return $this->hasOne(Patient::class,'patient_id','id')->withDefault();
    }

    public function doctors(){
        return $this->belongsToMany(Doctor::class);
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    public function nurses()
    {
        return $this->belongsToMany(Nurse::class, 'nurse_patient');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'patient_id','id');
    }
}
