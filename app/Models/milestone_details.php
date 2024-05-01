<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class milestone_details extends Model
{
    use HasFactory;
    protected $table = "milestone_details";
    protected $fillable = [
        "milestoneName",
        "milestoneDetails",
        "repetitions",
        "weight_increment",
        "goal",
    ];
    public function user_milestones(): BelongsTo{
        return $this->belongsTo(user_milestones::class);
    }
}
