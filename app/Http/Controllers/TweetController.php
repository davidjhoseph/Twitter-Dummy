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
         foreach($profile->user->tweets as $tweet){
             $friend = collect([
                'user' => $tweet->user ?? 'user does not exist',
                'profile' => $tweet->user->profile ?? 'no profile for this user',
                'tweet' => $tweet
             ]);
             $data[] = $friend;
         };
     };
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
    // }
}
