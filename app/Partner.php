<?php

namespace App;

use Illuminate\Foundation\Auth\Partner as Authenticatable;

class Partner extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'business_number', 'office_location', 'branch_location',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
