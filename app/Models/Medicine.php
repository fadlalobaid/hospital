<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable=[
        'medicine_name',
        'dosage',
        'date_created',
        'date_end',
        'manufacturer',
        'quantity',
        'price'
    ];
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'medication_prescription');
    }

}
