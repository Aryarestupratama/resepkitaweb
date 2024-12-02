<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'resep_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Resep
    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
