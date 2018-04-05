<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'phone', 'website', 'address_id', 'company_id',
    ];

    protected $guarded = [
        'id'
    ];

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
