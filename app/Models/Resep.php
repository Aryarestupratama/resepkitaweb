<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'descriptions',
        'ingredients',
        'steps',
        'cooking_time',
        'portion',
        'image_path',
        'category',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relasi ke Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function views()
    {
        return $this->hasMany(View::class, 'resep_id');
    }

    public function getTotalViewsAttribute()
    {
        return $this->views()->count();
    }
}
