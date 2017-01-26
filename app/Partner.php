<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'business_number', 'office_location', 'branch_location', 'password', 'office_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
