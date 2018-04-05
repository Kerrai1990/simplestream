<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'address';

    /**
     * @var array
     */
    protected $fillable = [
        'house_name_no', 'street', 'city', 'postcode'
    ];

    /**
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}
