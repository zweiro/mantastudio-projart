<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'correct',
        'question_id'
    ];
    
    public function questions() {
        return $this->belongsTo(Question::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
