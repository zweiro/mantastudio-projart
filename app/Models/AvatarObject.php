<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvatarObject extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function badge() {
        return $this->hasOne(User::class);
    }

    public function avatarObjectCategory() {
        return $this->belongsTo(AvatarObjectCategory::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
