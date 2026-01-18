<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = ['identifier', 'token', 'type', 'expires_at', 'attempts'];
    protected $casts = ['expires_at' => 'datetime'];
}