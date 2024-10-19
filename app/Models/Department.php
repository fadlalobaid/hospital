<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table='departments';
    protected $fillable=[
'name',
'description',
'status'
    ];
    public static function rules(){
        return [
            'name' => 'required|String|min:3|max:21',

            'description' =>
            [
                'required',
                'min:12',
                'max:350'
            ],
            'status' => 'in:active,inactive',
        ];
    }
    public function doctors(){
        return $this->hasMany(Doctor::class,'department_id','id');
    }
    public function nurses()
    {
        return $this->hasMany(Nurse::class,'department_id','id');
    }
}
