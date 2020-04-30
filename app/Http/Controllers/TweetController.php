<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{User, Tweets, Profile};

class TweetController extends Controller
{
    public function index() {
        $data = [];
     foreach(auth()->user()->following->pluck('pivot.profile_id') as $profileId) {
         $profile = Profile::find($profileId);
         $friend = collect([
            'user' => $profile->user ?? 'user does not exist',
            'profile' => $profile ?? 'no profile for this user',
            'tweet' => $profile->user->tweets
         ]);
            
         $data[] = $friend;
     } ;
     return $data;
    }
    public function show($id) {
        return Tweets::where('user_id', $id)->orderBy('id', 'desc')->get();
    }
    // public function test() {
    //     foreach(auth()->user()->following->pluck('pivot.profile_id') as $profileId){
    //         $profile = Profile::find($profileId);
    //         echo $profile->user->tweets;
    //     };
    }
}
