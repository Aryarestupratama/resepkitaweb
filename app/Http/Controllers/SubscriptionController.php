<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Notification;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth; // Pastikan ini diimpor

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
        {
            if (!Auth::check()) {
                return response()->json(['message' => 'Anda harus login untuk mengikuti.'], 401);
            }

            $request->validate([
                'subscribed_user_id' => 'required|exists:users,id',
            ]);

            $userId = Auth::id();
            $subscribedUserId = $request->subscribed_user_id;

            // Cek apakah pengguna sudah subscribe
            $existingSubscription = Subscriber::where('user_id', $userId)
                                            ->where('subscribed_user_id', $subscribedUserId)
                                            ->first();

            if ($existingSubscription) {
                return response()->json(['message' => 'Anda sudah mengikuti pengguna ini.'], 400);
            }

            // Buat subscription baru
            Subscriber::create([
                'user_id' => $userId,
                'subscribed_user_id' => $subscribedUserId,
            ]);

            // Kirim notifikasi
            $username = Auth::user()->username ?? Auth::user()->name ?? Auth::user()->email;
            Notification::create([
                'user_id' => $subscribedUserId,
                'type' => 'subscribe',
                'resep_id' => null,
                'message' => $username . ' telah mengikuti Anda.',
            ]);

            $newSubscriberCount = User::find($request->subscribed_user_id)->subscribers()->count();
            // Mengirim response untuk update UI
            return response()->json([
                'message' => 'Berhasil mengikuti pengguna.',
                'isSubscribed' => true,
                'newSubscriberCount' => $newSubscriberCount
            ]);
        }

    public function unsubscribe(Request $request, $subscribedUserId)
        {
            // Ambil ID pengguna yang sedang login
            $userId = Auth::id();
            
            // Cari subscription yang sudah ada
            $subscription = Subscriber::where('user_id', $userId)
                                    ->where('subscribed_user_id', $subscribedUserId)
                                    ->first();

            // Jika subscription tidak ditemukan
            if (!$subscription) {
                return response()->json(['message' => 'Anda belum mengikuti pengguna ini.'], 400);
            }

            // Hapus subscription
            $subscription->delete();

            // Ambil jumlah subscriber baru untuk update UI
            $newSubscriberCount = User::find($subscribedUserId)->subscribers()->count();

            // Mengirim response untuk update UI
            return response()->json([
                'message' => 'Berhasil mengikuti pengguna.',
                'isSubscribed' => false,
                'newSubscriberCount' => $newSubscriberCount
            ]);
        }


    public function viewSubscribedReseps(Request $request)
        {
            // Ambil ID pengguna yang sedang login
            $userId = Auth::id();

            // Ambil semua user yang disubscribe
            $subscribedUsers = DB::table('subscribers')
                                ->where('user_id', $userId)
                                ->pluck('subscribed_user_id'); // Ambil hanya ID pengguna yang disubscribe

            // Ambil semua resep dari pengguna yang di-subscribe
            $subscribedReseps = Resep::whereIn('user_id', $subscribedUsers)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

            // Kirim data resep dan subscribed users ke view
            return view('subscriptions.index', [
                'reseps' => $subscribedReseps,
                'subscribedUsers' => $subscribedUsers,
            ]);
        }
}
