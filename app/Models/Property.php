<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'address1',
        'city',
        'state',
        'zip',
        'desc',
        'parking',
        'images',
        'pref',
        'leaseType',
        'maxTenant',
        'totRent',
        'misc',
        'landlordID',
        'totBed',
        'totBath'
    ];


    protected $casts = [
        // 'images' => 'array',
        'pref' => 'array'
    ];
}
