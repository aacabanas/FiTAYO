<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_assessment extends Model
{
    use HasFactory;
    protected $table = "user_assessment";
    protected $fillable = [
    'height',
    'weight',
    'bmi',
    'bmi_classification',
    'medical_history',
    'hasIllness',
    'hasInjuries',
    'created_at',
    'profile_ID'
    ];
}
