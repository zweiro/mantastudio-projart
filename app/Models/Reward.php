<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\QuestionCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recompense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_end',
        'good_answer_step',
        'title',
        'text',
        'image_url',
        'file_url',
        'validity_date',
        'city_id',
        'question_category_id'
    ];

    public function cities() {
        return $this->belongsTo(City::class);
    }

    public function users() {
        return $this->belongsToMany(Utilisateur::class);
    }

    public function categorieQuestions() {
        return $this->belongsTo(CategorieQuestion::class);
    }
}
