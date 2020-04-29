<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   public function follow(User $user) {
        $follows = auth()->user()->following->contains($user->id) ? false : true;
       return collect([
           'status'=> auth()->user()->following()->toggle($user),
           'follows' => $follows
       ]);
   }
   public function following(User $user) {
        return auth()->user()->following->contains($user->id) ? 'true' : 'false';
   }
}
