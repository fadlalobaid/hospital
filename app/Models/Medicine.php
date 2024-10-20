<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_name',
        'dosage',
        'date_created',
        'date_end',
        'manufacturer',
        'quantity',
        'price'
    ];
    public static function rulse()
    {
        return [
            'medicine_name'=>'required',
            'dosage'=>'required',
            'date_created'=>'required',
            'date_end'=>'required',
            'manufacturer'=>'required',
            'quantity'=>'required',
            'price'=>'required',
        ];
    }
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'medication_prescription');
    }
}
