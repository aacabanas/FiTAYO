<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class user_milestones extends Model
{
    use HasFactory;
    protected $table = "user_milestones";
    protected $fillable = [
        'currentProgress',
        'status',
        'checked_in',
        'created_at'
    ];
    public function milestone_details(): HasOne
    {
        return $this->hasOne(milestone_details::class, 'milestone_ID', 'userMilestone_ID');
    }
    public function user_profile(): HasOne
    {
        return $this->hasOne(user_profile::class, 'profile_ID', 'userMilestone_ID');
    }
}
