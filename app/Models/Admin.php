<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;
    protected $fillable=[
        'user_name',
        'email',
        'email_verified_at',
        'password',
        'status',
    
    ];
}
