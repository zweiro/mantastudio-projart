<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function getFriends() {
        $user = Auth::user();
        $friends = $user->friends()->get();
        return $friends;
    }

    public function getUsers() {
        $user = Auth::user();
        $users = $user->where('id', '!=', auth()->id())->get();
        return $users;
    }

    public function showBattleFriends() {
        return Inertia::render('BattleChoice', [
            'friends' => $this->getFriends(),
            'users' => $this->getUsers(),
        ]);
    }

    public function showFriendsList() {
        return Inertia::render('Friends', [
            'friends' => $this->getFriends(),
            'users' => $this->getUsers(),
        ]);
    }

    public function getRandomPlayerId(){
        $user =  Auth::user();
        $randomPlayer = User::where('id', '!=', $user->id)->get('id')->random(1);
        
    }

    
}
