<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'views';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'resep_id',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Resep (opsional, jika diperlukan)
    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
