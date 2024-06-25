<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainers extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone','specialty','time_in','time_out','trainee_count'];
}
