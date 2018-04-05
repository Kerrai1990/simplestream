<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'name', 'catch_phrase', 'address_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }
}
