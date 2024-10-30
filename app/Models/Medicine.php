<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_name',
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
            'date_created'=>'required','date','befor:today',
            'date_end'=>'required','date','after:today',
            'manufacturer'=>'required',
            'quantity'=>'required|min:0',
            'price'=>'required',
        ];
    }
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'medication_prescription')->withPivot('quantity');
    }
}
