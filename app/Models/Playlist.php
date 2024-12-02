<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name']; 

    public function reseps()
    {
        return $this->belongsToMany(Resep::class, 'playlist_resep');
    }
}
