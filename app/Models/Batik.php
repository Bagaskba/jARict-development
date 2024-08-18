<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batik extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;


    protected $fillable = [
        'uuid',
        'uuid_user',
        'uuid_category',
        'catalog_picture',
        'name',
        'product_url',
        'motive_picture',
    ];

    protected $casts = [
        'uuid' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid_user', 'uuid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'uuid_category', 'uuid');
    }
}
