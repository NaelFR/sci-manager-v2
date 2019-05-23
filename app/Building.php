<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'address_line_1', 'address_line_2', 'city', 'region','postal_code', 'country', 'owner_id',
    ];

    protected $hidden = [
        'owner_id', 'updated_at', 'created_at'
    ];
}
