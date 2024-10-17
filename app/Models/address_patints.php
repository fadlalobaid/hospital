<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address_patints extends Model
{
    use HasFactory;
   protected $primaryKey='patient_id';
   protected $fillable=[
    'patient_id',
    'country',
    'city',
    'home',
   ];
   public function patient(){
    return $this->belongsToMany(Patient::class,'patient_id','id')->withDefault();
}
}
