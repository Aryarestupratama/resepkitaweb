<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resep;
use App\Models\Subscriber;

class UserProfileController extends Controller
{
    public function show(User $user)
        {   
            // Ambil resep yang diunggah oleh pengguna
            $reseps = Resep::where('user_id', $user->id)->get();

            // Hitung jumlah subscriber
            $subscriberCount = $user->subscribers()->count();

            // Cek apakah pengguna yang sedang login sudah mensubscribe profil ini
            $isSubscribed = Subscriber::where('user_id', Auth::id())
                                    ->where('subscribed_user_id', $user->id)
                                    ->exists();

            // Kirim data ke view
            return view('profile.show', compact('user', 'reseps', 'subscriberCount', 'isSubscribed'));
        }
}
