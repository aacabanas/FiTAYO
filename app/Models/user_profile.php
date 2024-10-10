<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_profile extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_profile';
    protected $primaryKey = 'profile_ID';

    protected $fillable = [
        'firstName',
        'lastName',
        'contactDetails',
        'birthdate',
        'age',
        'address_street_num',
        'address_barangay',
        'address_city',
        'address_region',
        'username'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
}
 