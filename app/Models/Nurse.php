<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'name',
        'birthday',
        'image',
        'gander',
        'email',
        'phone',
        'country',
        'city',
        'street'


    ];

    public static function rules()
    {
        return [
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|String|min:3|max:24',
            'birthday' => 'required|date|before:today',
            'gander' => 'in:male,female',
            'email' => 'required|email',
            'phone' => 'required|min:9|max:16',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
        ];
    }


    // public function user()
    // {
    //     return $this->belongsTo(related: User::class);
    // }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
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
