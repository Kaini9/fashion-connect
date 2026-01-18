<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne, HasMany, BelongsToMany};
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['role_id', 'name', 'email', 'password', 'is_active', 'is_verified'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed', 'is_active' => 'boolean', 'is_verified' => 'boolean'];

    public function role(): BelongsTo { return $this->belongsTo(Role::class); }
    public function profile(): HasOne { return $this->hasOne(Profile::class); }
    public function posts(): HasMany { return $this->hasMany(Post::class); }
    public function jobs(): HasMany { return $this->hasMany(Job::class); } // For Designers
    public function applications(): HasMany { return $this->hasMany(JobApplication::class); }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')->withTimestamps();
    }

    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')->withTimestamps();
    }
}
