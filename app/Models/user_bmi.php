<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_bmi extends Model
{
    use HasFactory;
    protected $table = "user_bmi";
    protected $fillable = [
        'username',
        'height',
        'weight',
        'bmi',
        'bmi_classification',
        'date'
    ];
}
