<?php

namespace App\Models;

use App\Models\City;
use App\Models\Answer;
use App\Models\QuestionAnswer;
use App\Models\QuestionCategory;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'image_url',
        'did_you_know',
        'image_dyk_url',
        'question_category_id'
    ];

    public function cities() {
        return $this->belongsTo(City::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function questionAnswers() {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function games() {
        return $this->belongsToMany(Answer::class);
    }

    public function questionCategories() {
        return $this->belongsTo(QuestionCategory::class);
    }
}
