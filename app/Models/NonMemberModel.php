<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonMemberModel extends Model
{
    use HasFactory;
    protected $table = "nonmembers";
    protected $fillable = [
        "firstname","lastname","date","time_in"
    ];
}
