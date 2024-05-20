<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class user_milestones extends Model
{
    use HasFactory;
    protected $table = "user_milestones";
    protected $fillable = [
        'currentProgress',
        'status',
        'checked_in',
        'created_at',
        'user_id',
    ];

    public function milestone_details(): HasOne
    {
        return $this->hasOne(milestone_details::class, 'milestone_ID', 'userMilestone_ID');
    }

    public function user_profile(): BelongsTo
    {
        return $this->belongsTo(user_profile::class, 'user_id', 'profile_ID');
    }

    public function advancement_requests(): HasMany
    {
        return $this->hasMany(MilestoneAdvancementRequest::class, 'milestone_id', 'userMilestone_ID');
    }
}