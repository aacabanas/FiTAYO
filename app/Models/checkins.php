<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkins extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id","username","date","time_in","time_out"
    ];
}
