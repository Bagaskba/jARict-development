<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    protected $casts = [
        'uuid' => 'string',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->uuid = Str::uuid()->toString();
        });
    }
}
