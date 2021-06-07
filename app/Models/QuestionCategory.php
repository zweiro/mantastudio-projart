<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url'
    ];

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function rewards() {
        return $this->hasMany(Reward::class);
    }

}
