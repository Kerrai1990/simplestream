<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    
    protected $fillable = [
        'house_name_no', 'street', 'city', 'postcode'
    ];

    protected $guarded = [
        'id'
    ];
}
