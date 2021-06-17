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
Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/test', function () {
    return "Bienvenue !";
})->name('start');

Route::middleware(['auth:sanctum', 'verified'])->get('start/battle', [UserController::class, 'showBattleFriends']);
Route::middleware(['auth:sanctum', 'verified'])->post('set-user-answer', [QuestionController::class, 'setUserAnswer']);
Route::middleware(['auth:sanctum', 'verified'])->get('start/category/{id?}', [GameController::class, 'gameSettings']);

Route::middleware(['auth:sanctum', 'verified'])->post('/init-game', [GameController::class, 'init'])->name('game');
Route::middleware(['auth:sanctum', 'verified'])->get('/play/{id}', [GameController::class, 'startGame'])->name('play');
Route::middleware(['auth:sanctum', 'verified'])->get('/answer/{id}', [QuestionController::class, 'getAnswer']);
Route::middleware(['auth:sanctum', 'verified'])->get('/results/{id}', [GameController::class, 'showResults']);
Route::middleware(['auth:sanctum', 'verified'])->get('/gains/{id}', [GameController::class, 'showGains']);


Route::middleware(['auth:sanctum', 'verified'])->get('friends', [UserController::class, 'showFriendsList'])->name('friends');

Route::middleware(['auth:sanctum', 'verified'])->post('friends/ask', [UserController::class, 'askFriend']);
Route::middleware(['auth:sanctum', 'verified'])->post('friends/accept', [UserController::class, 'acceptFriend']);
Route::middleware(['auth:sanctum', 'verified'])->post('friends/refuse', [UserController::class, 'refuseFriend']);

Route::middleware(['auth:sanctum', 'verified'])->get('start/battle', [UserController::class, 'showBattleFriends']);
Route::middleware(['auth:sanctum', 'verified'])->get('ranking', [GameController::class, 'getRanking']);

//TESTS
Route::middleware(['auth:sanctum', 'verified'])->get('/notify/{id}', [NotificationController::class, 'notify']);
Route::middleware(['auth:sanctum', 'verified'])->get('/get-notifs', [NotificationController::class, 'getNotifications']);

require_once __DIR__ . '/fortify.php';
require_once __DIR__ . '/jetstream.php';