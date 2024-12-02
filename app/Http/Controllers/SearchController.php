<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan untuk import facade Auth

class SearchController extends Controller
{
    // Menampilkan halaman pencarian dengan riwayat pencarian
    public function index()
        {
            // Ambil riwayat pencarian terakhir untuk user yang sedang login
            $history = SearchHistory::where('user_id', Auth::id())->latest()->get();

            // Menampilkan halaman pencarian
            return view('search.index', [
                'history' => $history,
            ]);
        }

    public function storeSearchQuery(Request $request)
        {
            $searchQuery = $request->search_query;

            // Simpan pencarian tanpa resep_id
            $searchHistory = SearchHistory::create([
                'user_id' => Auth::id(),
                'search_query' => $searchQuery,
            ]);

            // Cari resep berdasarkan kata kunci
            $results = Resep::where('title', 'like', '%' . $searchQuery . '%')->get();

            // Update riwayat pencarian dengan resep_id yang pertama kali ditemukan
            if ($results->isNotEmpty()) {
                $searchHistory->update([
                    'resep_id' => $results->first()->id, // Menggunakan resep pertama yang ditemukan
                ]);
            }

            $userHistory = SearchHistory::where('user_id', Auth::id())->latest()->get();
            if ($userHistory->count() > 10) {
                $userHistory->skip(10)->each->delete();
            }

            // Kirim data hasil pencarian dan history pencarian
            return view('search.index', [
                'results' => $results,
                'history' => SearchHistory::where('user_id', Auth::id())->latest()->take(10)->get(),
            ]);
        }

    public function deleteHistory($id)
        {
            $history = SearchHistory::where('id', $id)->where('user_id', Auth::id())->first();

            if ($history) {
                $history->delete();
                return redirect()->back()->with('success', 'Riwayat pencarian berhasil dihapus.');
            }

            return redirect()->back()->with('error', 'Riwayat tidak ditemukan.');
        }
}
