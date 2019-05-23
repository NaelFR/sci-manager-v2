<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'apartment_number', 'floor', 'rent', 'charges', 'building_id',
    ];

    protected $hidden = [
        'building_id', 'updated_at', 'created_at'
    ];
}
