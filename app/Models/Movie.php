<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = ['title', 'is_published', 'poster_url'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function getPosterUrlAttribute($value)
    {
        return $value ?: asset('images/default-poster.jpg');
    }
}
