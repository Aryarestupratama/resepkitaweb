<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resep_id',
        'search_query',
    ];

    // Relasi ke tabel Resep
    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
