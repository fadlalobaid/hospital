<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        // 'user_id',
        'name',
        'birthday',
        'gander',
        'phone',
        'email',
        'image',
        'country',
        'city',
        'street',
    ];
    public static function rules(){
        return [
            // 'user_id' => 'required|exists:users,id',
            'name' => 'required|String|min:3|max:24',
            'birthday'=>'required|date|before:today',
            'gander' => 'in:male,female',
            'email' => 'required|email',
            'phone'=>'required|min:9|max:16',
            'country'=>'required',
            'city'=>'required',
            'street'=>'required',
        ];
    }
    // public function user()
    // {
    //     return $this->belongsTo(related: User::class)->withDefault();
    // }

    public function doctors(){
        return $this->belongsToMany(Doctor::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    public function appointment(){
        return $this->belongsToMany(Appointment::class,'patient_id','id');
    }

    public function nurses()
    {
        return $this->belongsToMany(Nurse::class, 'nurse_patient');
    }

    public function reprots()
    {
        return $this->hasMany(Report::class,'patient_id','id');
    }
}
