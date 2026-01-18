<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'image_path', 'caption'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function likes(): HasMany { return $this->hasMany(Like::class); }
    public function comments(): HasMany { return $this->hasMany(Comment::class); }
}