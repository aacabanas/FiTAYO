<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MilestoneAdvancementRequest extends Model
{
    use HasFactory;
    protected $table = "milestone_advancement_requests";
    protected $fillable = [
        'milestone_id',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function milestone(): BelongsTo
    {
        return $this->belongsTo(user_milestones::class, 'milestone_id', 'userMilestone_ID');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}