<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilestoneProgress extends Model
{
    use HasFactory;
    protected $table = "MilestoneProgress";
    protected $fillable = [
        'lift','reps','username','status','date','action','request_time'
    ];
}
