<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resep;
use App\Models\Comment;
use App\Models\Like;
use App\Models\View;
use App\Models\Subscriber;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Data statistik untuk dashboard
        $statistics = [
            'totalUsers' => User::count(),
            'totalResep' => Resep::count(),
            'totalComments' => Comment::count(),
            'totalLikes' => Like::count(),
            'totalViews' => View::count(),
        ];

        // Data terbaru (opsional)
        $recentUsers = User::latest()->take(5)->get();
        $recentResep = Resep::latest()->take(5)->get();
        $recentComments = Comment::latest()->with('user')->take(5)->get();

        // Data populer
        $makananPopuler = Resep::select('reseps.id', 'reseps.title', 'reseps.image_path')
            ->leftJoin('views', 'reseps.id', '=', 'views.resep_id')
            ->where('reseps.category', 'makanan')
            ->selectRaw('COUNT(views.id) as total_views')
            ->groupBy('reseps.id', 'reseps.title', 'reseps.image_path')
            ->orderBy('total_views', 'desc')
            ->take(1)
            ->get();

        $minumanPopuler = Resep::select('reseps.id', 'reseps.title', 'reseps.image_path')
            ->leftJoin('views', 'reseps.id', '=', 'views.resep_id')
            ->where('reseps.category', 'minuman')
            ->selectRaw('COUNT(views.id) as total_views')
            ->groupBy('reseps.id', 'reseps.title', 'reseps.image_path')
            ->orderBy('total_views', 'desc')
            ->take(1)
            ->get();
        // Mengambil semua resep
        $reseps = Resep::all();

        // Mengambil semua pengguna
        $users = User::all();

        // Mengambil komentar untuk setiap resep
        $comments = Comment::with('resep', 'user')->get();

         // Resep Makanan dengan Like Terbanyak
        $mostLikedMakanan = Resep::where('category', 'makanan') // Pastikan kategori sesuai
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->first();

        // Resep Makanan dengan Komentar Terbanyak
        $mostCommentedMakanan = Resep::where('category', 'makanan') // Pastikan kategori sesuai
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->first();

        // Resep Minuman dengan Like Terbanyak
        $mostLikedMinuman = Resep::where('category', 'minuman') // Pastikan kategori sesuai
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->first();

        // Resep Minuman dengan Komentar Terbanyak
        $mostCommentedMinuman = Resep::where('category', 'minuman') // Pastikan kategori sesuai
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->first();

        // User dengan subscriber terbanyak
        $userWithMostSubscribers = User::withCount('subscribers')  // Menghitung jumlah subscriber
            ->orderBy('subscribers_count', 'desc')  // Urutkan berdasarkan jumlah subscriber
            ->first();

        return view('admin.dashboard', compact(
            'users',
            'statistics', 
            'recentUsers', 
            'recentResep', 
            'recentComments', 
            'reseps', 
            'comments',
            'makananPopuler',
            'minumanPopuler',
            'mostLikedMakanan',
            'mostLikedMinuman',
            'mostCommentedMakanan',
            'mostCommentedMinuman',
            'userWithMostSubscribers',
        ));
    }

    public function getViewers($id)
    {
        try {
            $resep = Resep::findOrFail($id);

            $viewers = View::where('resep_id', $id)
                ->with('user:id,username,email') // Mengambil informasi user
                ->get()
                ->map(function ($view) {
                    return [
                        'username' => $view->user ? $view->user->username : 'Unknown',
                        'email' => $view->user ? $view->user->email : 'Unknown',
                    ];
                });

            return response()->json(['viewers' => $viewers]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
