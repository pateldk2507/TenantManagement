<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'dob',
        'gender',
        'email',
        'phone',
        'property',
        'unit',
        'rent',
        'room',
        'leaseType',
        'signedDate',
        'regBy',
    ];

    protected $casts = [
       
    ];

}
