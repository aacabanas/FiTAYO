<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';
    protected $primaryKey = 'profile_ID';

    protected $fillable = [
        'firstName',
        'lastName',
        'contact_prefix',
        'contactDetails',
        'birthdate',
        'age',
        'address_street_num',
        'address_barangay',
        'address_city',
        'address_region',
        'user_ID',
        'userMem_ID',
        'profile_image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_ID');
    }

    public function userMembership(): HasOne
    {
        return $this->hasOne(user_membership::class, 'userMem_ID', 'userMem_ID');
    }

    public function userMilestones(): BelongsTo
    {
        return $this->belongsTo(user_milestones::class, 'profile_ID', 'profile_ID');
    }
}