<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class user_profile extends Model
{
    use HasFactory;
    protected $table = "user_profile";
    //for get all
    //first name last name
    protected $fillable = [
        'firstName',
        'lastName',
        'profileBio',
        'contactDetails',
        'birthdate',
        'address_num',
        'address_street',
        'address_city',
        'address_region',
        'user_ID',
        'userMem_ID'
        ];
        public function user_credentials(): HasOne{
            return $this->hasOne(user_credentials::class,'user_ID','profile_ID');
        }
        public function user_membership(): HasOne{
            return $this->hasOne(user_membership::class,"userMem_ID","profile_ID");
        }
        public function user_milestones(): BelongsTo{
            return $this->belongsTo(user_milestones::class);
        }
}
