<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'phone_number',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     public function subscribers()
    {
        return $this->hasMany(Subscriber::class, 'subscribed_user_id');
    }

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }
}
