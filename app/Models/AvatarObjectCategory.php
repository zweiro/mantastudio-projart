<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvatarObjectCategory extends Model
{
    use HasFactory;

    public $table = 'avatar_object_categories';

    public function avatarObject() {
        return $this->hasMany(AvatarObject::class);
    }

}
