<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'director',
        'star_rating',
        'date_published',
        'category_id',
        'photo',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
