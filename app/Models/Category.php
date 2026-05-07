<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use hasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }
}
