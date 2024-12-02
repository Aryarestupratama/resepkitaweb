<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
        {
            $notifications = Notification::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($notifications);
        }

    public function markAsRead($id)
        {
            $notification = Notification::findOrFail($id);
            $notification->is_read = true;
            $notification->save();

            return response()->json(['message' => 'Notifikasi telah ditandai sebagai dibaca.']);
        }
}
