<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'member_id'];

    public function media()
    {
        return $this->belongsToMany(Media::class)->withTimestamps();
    }
}
