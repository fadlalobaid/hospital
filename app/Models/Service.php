<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
 protected $fillable=[
    'department_id',
    'service_name',
    'service_charge',
    'discription',
    'Doctor_commission',
 ];

 public static function rules(){
    return [
        'department_id'=>'required|exists:departments,id',
        'service_name'=>'required|min:3|max:20',
        'service_charge'=>'required',
        'discription'=>'required',
        'Doctor_commission'=>'required',

    ];
 }
 public function department(){
    return $this->belongsTo(Department::class,'department_id','id');

}
public function patints(){
    return $this->belongsToMany(Patient::class);
}
}
