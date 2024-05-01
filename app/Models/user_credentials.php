<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class user_credentials extends Model
{
    use HasFactory;
    protected $table = "user_credentials";
    protected $fillable = [
        'username','password','user_email','user_type'
    ];
    protected $hidden = ['password'];
    public function user_membership(): BelongsTo{
        return $this->belongsTo(user_membership::class);
    }
    
}
