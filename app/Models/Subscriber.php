<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'subscribers';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'subscribed_user_id',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscribedUser ()
    {
        return $this->belongsTo(User::class, 'subscribed_user_id');
    }

    public function subscribedUserReseps()
    {
        return $this->hasManyThrough(
            Resep::class, // Model target (Resep)
            User::class,  // Model perantara (User)
            'id',         // Foreign key di tabel User (id user yang di-subscribe)
            'user_id',    // Foreign key di tabel Resep
            'subscribed_user_id', // Foreign key di tabel Subscriber
            'id'          // Primary key di tabel User
        );
    }
}
