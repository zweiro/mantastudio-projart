<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Return all accepted friends of the current user
     */
    public function getFriends() {
        $user = Auth::user();
        $friends = $user->friends()->wherePivot('isAccepted', 1)->get();
        return $friends;
    }

    /**
     * Return all the users except the accepted friends of the current user
     */
    public function getUsers() {
        $user = Auth::user();
        $friends = $user->friends()->get();
        $allUsers = $user->where('id', '!=', auth()->id())->get();
        $users = $allUsers->diff($friends);
        return $users;
    }
    
    /**
     * Return all the friend requests from the current user
     */
    public function getRequests() {
        $user = Auth::user();
        $requests = $user->friends()->wherePivot('isAccepted', 0)->wherePivot('request_user_id', '!=', $user->id)->get();
        return $requests;
    }

    public function getUserGames() {
        $currentUser = Auth::user();
        $games = [];

        $allGames = DB::table('game_user')
            ->join('users', 'game_user.user_id', '=', 'users.id')
            ->select('users.username', 'game_user.user_id', 'game_user.game_id', 'game_user.start_time')
            ->where('users.username', $currentUser->username)
            ->where('game_user.start_time', null)
            ->get();

        foreach($allGames as $game){
            $challenge = DB::table('game_user')
            ->join('users', 'game_user.user_id', '=', 'users.id')
            ->select('users.username', 'game_user.user_id', 'game_user.game_id', 'game_user.start_time')
            ->where('game_user.game_id', $game->game_id)
            ->where('users.username', '!=', $currentUser->username)
            ->get();

            $games[] = $challenge->toArray();

        }
        
        //dd($games);
        
        return $games;
    }

    /**
     * Return the battle choice view with the friends of the current user and the other users
     */
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
            'requests' => $this->getRequests(),
            'games' => $this->getUserGames()
        ]);
    }

    public function askFriend(Request $request) {
        $user = Auth::user();
        $friend = User::where('id', $request->get('user'))->first();
        $user->friends()->attach($request->get('user'), ['friend_id' => $user->id, 'request_user_id' => $user->id]);
        $friend->friends()->attach($user->id, ['friend_id' => $request->get('user'), 'request_user_id' => $user->id]);
        return redirect()->back();
    }

    public function acceptFriend(Request $request) {
        $user = Auth::user();
        $friend = User::where('id', $request->get('user'))->first();
        $user->friends()->updateExistingPivot($request->get('user'), ['friend_id' => $user->id, 'request_user_id' => $request->get('user'), 'isAccepted' => 1]);
        $friend->friends()->updateExistingPivot($user->id, ['friend_id' => $request->get('user'), 'request_user_id' => $request->get('user'), 'isAccepted' => 1]);
        return redirect()->back();
    }

    public function refuseFriend(Request $request) {
        $user = Auth::user();
        $friend = User::where('id', $request->get('user'))->first();
        $user->friends()->detach($request->get('user'));
        $friend->friends()->detach($user->id);
        return redirect()->back();
    }
    

    public function getRandomPlayerId(){
        $user =  Auth::user();
        $randomPlayer = User::where('id', '!=', $user->id)->get('id')->random(1);
        
    }

    
}
