<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address_doctor extends Model
{
    use HasFactory;

    protected $table='address_doctors';
    protected $primaryKey='doctor_id';
    protected $fillable=[
     'doctor_id',
     'country',
     'city',
     'home'
    ];
    public static function rules(){
        return [

            'country'=>'required',
            'city'=>'required',
            'home'=>'required'
        ];

    }
    public function doctor(){
        return $this->belongsToMany(doctor::class,'doctor_id','id')->withDefault();
    }
}
