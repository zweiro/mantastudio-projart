<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getFriends() {
        $user = Auth::user();
        $users = $user->where('id', '!=', auth()->id())->get();
        $friends = $user->friends()->get();
        return Inertia::render('BattleChoice', [
            'friends' => $friends,
            'users' => $users
        ]);
    }
}
