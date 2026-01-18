<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verification extends Model
{
    protected $fillable = ['user_id', 'payment_id', 'expires_at', 'status'];
    protected $casts = ['expires_at' => 'datetime'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function payment(): BelongsTo { return $this->belongsTo(Payment::class); }
}
