<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookmarkController extends Controller
{
    use AuthorizesRequests;

    public function index()
        {
            // Ambil semua bookmark untuk pengguna yang sedang login
            $bookmarks = Bookmark::where('user_id', Auth::id())->with('resep')->get();
            
            // Ambil semua playlist untuk pengguna yang sedang login
            $playlists = Playlist::where('user_id', Auth::id())->with('reseps')->get();

            // Kirim data bookmarks dan playlists ke view
            return view('bookmarks.index', compact('bookmarks', 'playlists'));
        }

    public function store(Request $request)
        {
            $request->validate([
                'resep_id' => 'required|exists:reseps,id',
            ]);

            // Cek apakah bookmark sudah ada untuk user dan resep yang sama
            $existingBookmark = Bookmark::where('user_id', Auth::id())
                                        ->where('resep_id', $request->resep_id)
                                        ->first();

            if ($existingBookmark) {
                // Redirect dengan pesan error
                return redirect()->back()->with('error', 'Resep ini sudah ada di bookmark!');
            }

            // Tambahkan ke bookmark
            Bookmark::create([
                'user_id' => Auth::id(),
                'resep_id' => $request->resep_id,
            ]);

            return redirect()->back()->with('success', 'Resep berhasil disimpan ke bookmark!');
        }


    public function destroy($id)
        {
            $bookmark = Bookmark::findOrFail($id);

            // Pastikan pengguna yang login adalah pemilik bookmark
            if ($bookmark->user_id !== Auth::id()) {
                abort(403, 'This action is unauthorized.');
            }

            // Hapus bookmark
            $bookmark->delete();

            return redirect()->back()->with('success', 'Bookmark berhasil dihapus!');
        }
}