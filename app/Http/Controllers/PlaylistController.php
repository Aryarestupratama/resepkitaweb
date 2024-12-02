<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'playlist_name' => 'required|string|max:255', // Perbaikan pada validasi
                'resep_ids' => 'required|array',
                'resep_ids.*' => 'exists:reseps,id',
            ]);

            // Membuat instance baru untuk Playlist
            $playlist = new Playlist();
            $playlist->name = $request->playlist_name;
            $playlist->user_id = Auth::id(); // Menetapkan user_id
            $playlist->save(); // Menyimpan playlist ke database

            // Mengaitkan resep dengan playlist
            $playlist->reseps()->attach($request->resep_ids);

            return redirect()->back()->with('success', 'Playlist berhasil dibuat!');
        }

    public function show(Playlist $playlist)
        {
            // Memastikan hanya resep yang terkait dengan playlist yang diambil
            $resep = $playlist->reseps; // Asumsi Anda memiliki relasi 'reseps' di model Playlist

            return view('playlists.show', compact('playlist', 'resep'));
        }
}
