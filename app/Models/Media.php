<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'title', 'type', 'year', 'genres', 'rating',
        'episodes', 'chapters', 'volumes', 'country', 'author',
    ];

    protected $casts = [
        'genres' => 'array',
        'rating' => 'float',
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class)->withTimestamps();
    }
}
