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

//Carbon::now()->timestamp;

class GameController extends Controller
{
    public const GAME_HOME = 'start';
    public const GAME_MAX_TIME = 180; // 10 questions x (3 seconds of questions read + 10 seconds for answer + 5 seconds of results)

    /**
     *  Initialize a new game with requested question type and players
     *  @param Request Laravel Request's object containing the user's inputs
     */
    public function init(Request $request) {
        $game = new Game();
        $game->save();
        $mainPlayer = User::find(Auth::user()->id);
        if(isset($request->opponent_id)) {
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
        return Inertia::render('Welcome');
    }

    public function startGame($gameId) {
        $user = Auth::user()->id;
        $game = Game::find($gameId);
        $isPlayer = $game->players()->get()->contains($user);
        if($isPlayer && $game->players()->wherePivot('user_id', '=', $user)->first()->pivot->start_time === null) {
            $game->players()->updateExistingPivot($user, [
                'start_time' => Carbon::now()->timestamp
                ]);
        }
        if($game === null || !$isPlayer/* || Carbon::now()->timestamp - $game->players()->wherePivot('user_id', '=', $user)->first()->pivot->start_time > GameController::GAME_MAX_TIME*/) {
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
        ]);
    }
}
