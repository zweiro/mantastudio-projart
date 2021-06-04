<?php

namespace App\Models;

use App\Models\Canton;
use App\Models\Reward;
use App\Models\AvatarObject;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'canton_id'
    ];

    public function cantons() {
        return $this->belongsTo(Canton::class);
    }

    public function rewards() {
        return $this->hasMany(Reward::class);
    }
    
    public function avatarObjects() {
        return $this->hasMany(AvatarObject::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
