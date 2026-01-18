<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = ['user_id', 'amount', 'transaction_id', 'type', 'status'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}