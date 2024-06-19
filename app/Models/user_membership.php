<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_membership extends Model
{
    use HasFactory;

    protected $table = 'user_membership';

    protected $fillable = [
        'membership_plan',
        'start_date',
        'expiry_date',
        'next_payment',
        'payment_status',
        'Trainer',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
