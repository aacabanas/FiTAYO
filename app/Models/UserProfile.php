<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';
    protected $primaryKey = 'profile_ID';
    public $timestamps = true;

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'profile_image',
        'user_ID',
        'contact_prefix',
        'contactDetails',
        'address_street_num',
        'address_barangay',
        'address_city',
        'address_region',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }
}