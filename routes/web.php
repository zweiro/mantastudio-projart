<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PUBLIC ROUTES
Route::get('/', function () {
    return Inertia::render('Welcome');
});
Route::get('/rules', function () {
    return Inertia::render('Rules');
})->name('rules');;

//AUTH ROUTES
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('start', function () {
    return Inertia::render('Start');
})->name('start');

Route::get('/notify/{id}', [NotificationController::class, 'notify']);
Route::get('/get-notifs', [NotificationController::class, 'getNotifications']);

Route::get('game', function () {
    return Inertia::render('Game');
});
Route::post('/init-game', [GameController::class, 'init'])->name('game');

Route::get('start/category', function () {
    return Inertia::render('Category');
});


Route::get('friends', [UserController::class, 'showFriendsList'])->name('friends');

Route::post('friends/ask', [UserController::class, 'askFriend']);
Route::post('friends/accept', [UserController::class, 'acceptFriend']);
Route::post('friends/refuse', [UserController::class, 'refuseFriend']);

Route::get('start/battle', [UserController::class, 'showBattleFriends']);

require_once __DIR__ . '/fortify.php';
require_once __DIR__ . '/jetstream.php';