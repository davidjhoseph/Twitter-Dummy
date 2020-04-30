<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function followers() {
        return $this->belongsToMany(User::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }


}
