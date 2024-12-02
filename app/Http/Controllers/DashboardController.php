<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
        {
            $user = Auth::user();

            // Makanan populer
            $makananPopuler = Resep::select('reseps.id', 'reseps.title', 'reseps.image_path')
                ->leftJoin('views', 'reseps.id', '=', 'views.resep_id')
                ->where('reseps.category', 'makanan') // Filter berdasarkan kategori
                ->selectRaw('COUNT(views.id) as total_views')
                ->groupBy('reseps.id', 'reseps.title', 'reseps.image_path')
                ->orderBy('total_views', 'desc')
                ->take(10)
                ->get();

            // Minuman populer
            $minumanPopuler = Resep::select('reseps.id', 'reseps.title', 'reseps.image_path')
                ->leftJoin('views', 'reseps.id', '=', 'views.resep_id')
                ->where('reseps.category', 'minuman') // Filter berdasarkan kategori
                ->selectRaw('COUNT(views.id) as total_views')
                ->groupBy('reseps.id', 'reseps.title', 'reseps.image_path')
                ->orderBy('total_views', 'desc')
                ->take(10)
                ->get();

            return view('dashboard', [
                'username' => $user->username,
                'makananPopuler' => $makananPopuler,
                'minumanPopuler' => $minumanPopuler,
            ]);
        }
}
