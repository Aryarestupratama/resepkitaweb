<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'notifications';

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'type',
        'resep_id',
        'message',
        'is_read',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Resep
    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
