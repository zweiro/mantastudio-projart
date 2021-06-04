<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'image_url'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function avatarObjects() {
        return $this->hasMany(AvatarObject::class);
    }

    public function AvatarObject() {
        return $this->hasMany(Answer::class);
    }
}
