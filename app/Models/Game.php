<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function answers() {
        return $this->belongsToMany(Answer::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class);
    }

    public function players() {
        return $this->belongsToMany(User::class);
    }
}
