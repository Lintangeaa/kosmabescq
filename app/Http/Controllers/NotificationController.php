<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function poll()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->with('reservation')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'notifications' => $notifications,
            'unreadCount' => $notifications->where('is_read', false)->count()
        ]);
    }

    public function markAsRead(Request $request)
    {
        $notification = Notification::findOrFail($request->notification_id);

        if ($notification->user_id === Auth::id()) {
            $notification->update(['is_read' => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 403);
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function clearRead()
    {
        Notification::where('user_id', Auth::id())
            ->where('is_read', true)
            ->delete();

        return response()->json(['success' => true]);
    }
}
