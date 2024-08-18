<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    public function batiks(): HasMany
    {
        return $this->hasMany(Batik::class, 'uuid_user', 'uuid');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'username',
        'email',
        'password',
        'role',
        'image',
        'store_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'uuid' => 'string',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->uuid = Str::uuid()->toString();
        });
    }

    public const ROLE_ADMIN = 1;
    public const ROLE_STORE = 2;

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isStore(): bool
    {
        return $this->role === self::ROLE_STORE;
    }
}
