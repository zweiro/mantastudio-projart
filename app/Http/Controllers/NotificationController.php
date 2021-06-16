<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\FriendRequestSent;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notify($id) {
        $userToNotify = User::where('id',$id)->first();
        dd($userToNotify);
        $userToNotify->notify(new FriendRequestSent(Auth::user()));
        return "Notification sent !";
    }

    public function getNotifications() {
        $user = Auth::user();
        dd($user->unreadNotifications);
        return $user->unreadNotifications;
    }
}
