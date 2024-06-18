<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'lift','username','status','data','action','request_time'
    ];
}
