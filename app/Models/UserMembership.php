<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMembership extends Model
{
    use HasFactory;

    protected $table = "user_membership";

    protected $fillable = [
        'membership_type',
        'membership_plan',
        'membership_desc',
        'start_date',
        'expiry_date',
        'next_payment',
        'payment_status',
        'Trainer',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
