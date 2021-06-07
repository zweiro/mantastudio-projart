<?php

namespace App\Models;

use App\Models\User;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function cities() {
        return $this->hasMany(City::class);
    }
}
