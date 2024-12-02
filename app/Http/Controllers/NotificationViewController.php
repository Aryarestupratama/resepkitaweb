<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationViewController extends Controller
{
    public function index()
        {
            $notifications = Notification::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();

            return view('notifications.index', compact('notifications'));
        }

    public function markAsRead($id)
        {
            $notification = Notification::findOrFail($id);
            
            // Pastikan notifikasi milik pengguna yang sedang login
            if ($notification->user_id !== Auth::id()) {
                return redirect()->back()->withErrors(['message' => 'Notifikasi tidak ditemukan.']);
            }

            $notification->is_read = true;
            $notification->save();

            return redirect()->back()->with('message', 'Notifikasi telah ditandai sebagai dibaca.');
        }
}
