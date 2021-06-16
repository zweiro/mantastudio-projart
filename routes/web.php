<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuestionController;

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
Route::middleware(['auth:sanctum', 'verified'])->get('start', function () {
    return Inertia::render('Start');
})->name('start');

Route::middleware(['auth:sanctum', 'verified'])->get('start/battle', [UserController::class, 'showBattleFriends']);
Route::get('start/category/{id?}', [GameController::class, 'gameSettings']);

Route::post('/init-game', [GameController::class, 'init'])->name('game');
Route::get('/play/{id}', [GameController::class, 'startGame'])->name('play');
Route::get('/answer/{id}', [QuestionController::class, 'getAnswer']);
Route::get('/results', function () {
    return Inertia::render('Results');
});


Route::get('friends', [UserController::class, 'showFriendsList'])->name('friends');

Route::post('friends/ask', [UserController::class, 'askFriend']);
Route::post('friends/accept', [UserController::class, 'acceptFriend']);
Route::post('friends/refuse', [UserController::class, 'refuseFriend']);

Route::get('start/battle', [UserController::class, 'showBattleFriends']);

//TESTS
Route::get('/notify/{id}', [NotificationController::class, 'notify']);
Route::get('/get-notifs', [NotificationController::class, 'getNotifications']);

require_once __DIR__ . '/fortify.php';
require_once __DIR__ . '/jetstream.php';