<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

//Carbon::now()->timestamp;

class GameController extends Controller
{
    public const GAME_HOME = 'start';
    public const GAME_MAX_TIME = 180; // 10 questions x (3 seconds of questions read + 10 seconds for answer + 5 seconds of results)
    public const SEASON_GOAL = 50;

    /**
     * Show Category or City selection vue
     * @param id of the opponent
     */
    public function gameSettings($id = null) {
        $opponent = User::where('id', $id)->first();
        if($id != null && $opponent == null) {
            return Inertia::render('Start');
        } else {
            $lausanne_full = DB::table('game_question_question_answer_user')
            ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
            ->where('user_id', Auth::user()->id)
            ->where('questions.city_id', 2)
            ->where('points', '!=', 0)
            ->count();

            $lausanne_percent = min(intval($lausanne_full / GameController::SEASON_GOAL * 100),100);

            $neuchatel_full = DB::table('game_question_question_answer_user')
            ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
            ->where('user_id', Auth::user()->id)
            ->where('questions.city_id', 4)
            ->where('points', '!=', 0)
            ->count();

            $neuchatel_percent = min(intval($neuchatel_full / GameController::SEASON_GOAL * 100),100);
                return Inertia::render('Category', [
                    'opponent_id' => $id,
                    'lausanne_percent' => $lausanne_percent,
                    'neuchatel_percent' => $neuchatel_percent
                ]);
        }
    }

    /**
     *  Initialize a new game with requested question type and players
     *  @param Request Laravel Request's object containing the user's inputs
     */
    public function init(Request $request) {
        $game = new Game();
        $game->save();
        $mainPlayer = User::find(Auth::user()->id);
        if($request->opponent_id != null) {
            $opponent = User::find($request->opponent_id);
        }
        if(isset($request->city_id)) {
            $questions = Question::where('city_id', $request->city_id)->get()->random(10);
        } else {
            $questions = Question::where('question_category_id', $request->question_category_id)->get()->random(10);
        }
        $game->questions()->attach($questions);

        $game->players()->attach([
            $mainPlayer->id => ['start_time' => Carbon::now()->timestamp]
        ]);
        if(isset($opponent)) {
            $game->players()->attach([
                $opponent->id => ['start_time' => null],
            ]);
        }
        
        return redirect()->route('play', ['id' => $game->id]);
    }

    /**
     * Start the game
     * @param gameId Id of the game to start
     */
    public function startGame($gameId) {
        $user = Auth::user()->id;
        $game = Game::find($gameId);
        $isPlayer = $game->players()->get()->contains($user);
        if($isPlayer && $game->players()->wherePivot('user_id', '=', $user)->first()->pivot->start_time === null) {
            $game->players()->updateExistingPivot($user, [
                'start_time' => Carbon::now()->timestamp
                ]);
        }
        if($game === null || !$isPlayer || Carbon::now()->timestamp - $game->players()->wherePivot('user_id', '=', $user)->first()->pivot->start_time > GameController::GAME_MAX_TIME) {
            return Redirect::route(GameController::GAME_HOME);
        }

        $questions = $game->questions()->get();
        $fullQuestions = array();
        foreach ($questions as $question) {
            array_push($fullQuestions,[
                'id' => $question->id,
                'text' => $question->text,
                'answers' => $question->questionAnswers()->inRandomOrder()->get(['id','text'])->ToArray()
            ]);
        }
        
        return Inertia::render('Game', [
            'questions' => $fullQuestions,
            'game_id' => $game->id,
        ]);
    }

    /**
     * Show the results of a given name
     * @param gameId id of the game we want the result
     */
    public function showResults($gameId) {
        $game = Game::where('id', $gameId)->first();
        if($game == null || !$game->players()->where('users.id', Auth::user()->id)->exists()) {
            return Redirect::route(GameController::GAME_HOME);
        }
        $nbRightAnswers = DB::table('game_question_question_answer_user')
                ->where('game_id', $gameId)
                ->where('user_id', Auth::user()->id)
                ->where('points', '!=', 0)
                ->count();
            
        $nbPoints = DB::table('game_question_question_answer_user')
        ->where('game_id', $gameId)
        ->where('user_id', Auth::user()->id)
        ->sum('points');

        return Inertia::render('Results', [
            'nbRightAnswers' => $nbRightAnswers,
            'nbPoints' => $nbPoints,
            'game_id' => $game->id
        ]);
    }

    /**
     * Show player gaines for the given game
     * @param gameId id of the wanted game gaines
     */
    public function showGains($gameId) {
        $game = Game::where('id', $gameId)->first();

        if($game == null || !$game->players()->where('users.id', Auth::user()->id)->exists()) {
            return Redirect::route(GameController::GAME_HOME);
        }

        $lausanne = DB::table('game_question_question_answer_user')
        ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
        ->where('game_id', $gameId)
        ->where('user_id', Auth::user()->id)
        ->where('questions.city_id', 2)
        ->where('points', '!=', 0)
        ->count();

        $lausanne_full = DB::table('game_question_question_answer_user')
        ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
        ->where('user_id', Auth::user()->id)
        ->where('questions.city_id', 2)
        ->where('points', '!=', 0)
        ->count();

        $lausanne_percent = min(intval($lausanne_full / GameController::SEASON_GOAL * 100),100);

        $neuchatel = DB::table('game_question_question_answer_user')
        ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
        ->where('game_id', $gameId)
        ->where('user_id', Auth::user()->id)
        ->where('questions.city_id', 4)
        ->where('points', '!=', 0)
        ->count();

        $neuchatel_full = DB::table('game_question_question_answer_user')
        ->join('questions', 'game_question_question_answer_user.question_id', '=', 'questions.id')
        ->where('user_id', Auth::user()->id)
        ->where('questions.city_id', 4)
        ->where('points', '!=', 0)
        ->count();

        $neuchatel_percent = min(intval($neuchatel_full / GameController::SEASON_GOAL * 100),100);

        return Inertia::render('Earnings', [
            'lausanne' => $lausanne,
            'neuchatel' => $neuchatel,
            'lausanne_percent' => $lausanne_percent,
            'neuchatel_percent' => $neuchatel_percent
        ]);
    }

    /**
     * callback method to sort the ranking
     */
    public function scoreCmp($a,$b) {
        if((int)$a['score'] == (int)$b['score'])return 0;
        if((int)$a['score']  > (int)$b['score'])return 1;
        if((int)$a['score']  < (int)$b['score'])return -1;
    }

    /**
     * Show ranking vue
     */
    public function getRanking() {
        $rankedGamesIds = array();
        $games = Game::all();
        foreach ($games as $game) {
            $gameFinished = true;
            foreach ($game->players()->get() as $player) {
                if($game->players()->wherePivot('user_id', '=', $player->id)->first()->pivot->start_time === null || Carbon::now()->timestamp-$game->players()->wherePivot('user_id', '=', $player->id)->first()->pivot->start_time < GameController::GAME_MAX_TIME) {
                    $gameFinished = false;
                }
            }
            if($gameFinished && $game->players()->count() > 1){
                array_push($rankedGamesIds, $game->id);
            }
        }
        $playerScore = array();
        foreach (User::all() as $user) {
            $playerScore[$user->id] = [
                'username' => $user->username,
                'score' => 0,
                'current_user' => $user->id == Auth::user()->id ? 1 : 0
            ];
        }
        foreach (User::all() as $user) {
            $battleGames = Game::whereIn('id', $rankedGamesIds)->get();
            foreach ($battleGames as $battleGame) {
                if($battleGame->players()->wherePivot('user_id', $user->id)->exists()) {
                    $player_points = DB::table('game_question_question_answer_user')
                    ->where('game_id', $battleGame->id)
                    ->where('user_id', $user->id)
                    ->sum('points');

                    
                    $opponent_points = DB::table('game_question_question_answer_user')
                    ->where('game_id', $battleGame->id)
                    ->where('user_id', '!=', $user->id)
                    ->sum('points');
                    
                    if($player_points > $opponent_points) {
                        $playerScore[$user->id]['score'] += $player_points;
                    } else {
                        if($playerScore[$user->id]['score'] - ($opponent_points-$player_points) <= 0) {
                            $playerScore[$user->id]['score'] = 0;
                        } else {
                            $playerScore[$user->id]['score'] -= ($opponent_points-$player_points);
                        }
                    }
                }
            }
        }
        usort($playerScore,function($a,$b){
            if((int)$a['score'] == (int)$b['score'])return 0;
            if((int)$a['score']  > (int)$b['score'])return -1;
            if((int)$a['score']  < (int)$b['score'])return 1;
        });
        return Inertia::render('Ranking', [
            'current_user' => Auth::user()->username,
            'scores' => $playerScore,
        ]);

        
    }
}
