<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{User, Tweets};

class TweetController extends Controller
{
    public function index() {
        $data = [];
     foreach(Tweets::orderBy('created_at', 'desc')->get() as $tweet) {
         $friend = collect([
            'user' => $tweet->user ?? 'user does not exist',
            'profile' => $tweet->user->profile ?? 'no profile for this user',
            'tweet' => $tweet
         ]);
            
         $data[] = $friend;
     } ;
     return $data;
    }
    public function show($id) {
        return Tweets::where('user_id', $id)->orderBy('id', 'desc')->get();
    }
    // public function test() {
    //     $data = [];
    //     foreach(Tweets::orderBy('created_at', 'desc')->get() as $tweet) {
    //         $friend = collect([
    //             'user' => $tweet->user,
    //             'profile' => $tweet->user->profile ?? 'no profile for this user',
    //             'tweet' => $tweet
    //          ]);
               
    //        $data[] = $friend;
    //     } ;
    //     return $data;
    // }
}
