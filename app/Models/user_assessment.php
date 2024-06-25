<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_assessment extends Model
{
    use HasFactory;
    protected $table = "user_assessment";
    public $increments = false;

    protected $fillable = [
    
    'physically_fit',
    'operation',
    'high_blood',
    'heart_problem',
    'emergency_contact_name',
    'emergency_contact_num',
    'profile_ID'
    ];
}
