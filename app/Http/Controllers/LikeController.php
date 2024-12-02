<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request, $id)
        {
            try {
                $userId = Auth::id(); // Pastikan user sudah login
                if (!$userId) {
                    return response()->json(['error' => 'Anda harus login terlebih dahulu.'], 401);
                }

                // Periksa apakah resep sudah di-like oleh user
                $likeExists = DB::table('likes')
                    ->where('user_id', $userId)
                    ->where('resep_id', $id)
                    ->exists();

                if ($likeExists) {
                    return response()->json(['error' => 'Anda sudah menyukai resep ini.'], 400);
                }

                // Tambahkan "like" ke database
                DB::table('likes')->insert([
                    'user_id' => $userId,
                    'resep_id' => $id,
                    'created_at' => now(),
                ]);

                return response()->json(['success' => true, 'message' => 'Resep berhasil disukai.']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Terjadi kesalahan saat menambahkan like: ' . $e->getMessage()], 500);
            }
        }

    public function show($id)
        {
            $like = Like::findOrFail($id);

            return view('admin.like.show', compact('like'));
        }
}
