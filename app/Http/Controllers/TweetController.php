<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{User, Tweets, Profile};

class TweetController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $data = [];
        $ids =  [...auth()->user()->following->pluck('pivot.profile_id'),auth()->user()->id];
     foreach( $ids as $profileId) {
         $profile = Profile::find($profileId);
         foreach($profile->user->tweets  as $tweet){
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
    public function store(Request $request) {
        $data = $request->validate([
            'content' => 'required|min:8',
            'file' => ''
        ]);
        if(request('file')){
            $file = request('file')->store('tweet','public');
            auth()->user()->tweets()->create(array_merge($data,[
                'file' => $file,
                'name' => auth()->user()->name,
                'username' => auth()->user()->username
            ]));
            return redirect('dashboard');
        }else{
            auth()->user()->tweets()->create(array_merge($data,[
                'name' => auth()->user()->name,
                'username' => auth()->user()->username
            ]));
            return redirect('dashboard');
        }
    }
}
