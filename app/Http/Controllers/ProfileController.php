<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id) {
        // $follows = (auth()->user()) ? auth()->user()->following->contains($id) : false; 
        return collect([
           'user' => User::find($id),
            'profile' => User::find($id)->profile,
        ]);

    }
    public function edit() {
        $id = Auth::user()->id;
        $user = User::find($id);
        $profile = User::find($id)->profile;
        return view('editprofile', compact('user','profile'));
    }
    
    public function update (Request $request, $id) {
        if(request('name')){
            $user = $request->validate([
                'name' => ['min:5'],
                'username' => ['min:5'],
            ]);
            User::find($id)->update($user);
        }
        $data = $request->validate([
            'caption' => ['min:8'],
            'profileImg'=> '',
            'headerImg'=> '',
            'location'=> ['min:8'],
            'dob' => ''
        ]);
        if(request('profilepic')){
            $profilepicPath = request('profilepic')->store('profile', 'public');
            User::find($id)->profile()->update(array_merge($data, [
                'profileImg' =>  $profilepicPath
            ]));
            return redirect('dashboard');


        }elseif(request('headerpic')){
            $headerpicpicPath = request('headerpic')->store('profile', 'public');
            User::find($id)->profile()->update(array_merge($data, [
                'headerImg' =>  $headerpicpicPath
            ]));
            return redirect('dashboard');

        }elseif(request('profilepic') && request('headerpic')) {
            $profilepicPath = request('profilepic')->store('profile', 'public');
            $headerpicpicPath = request('headerpic')->store('profile', 'public');
            User::find($id)->profile()->update(array_merge($data, [
                'profileImg' =>  $profilepicPath,
                'headerImg' =>  $headerpicpicPath
            ]));
            return redirect('dashboard');
        }
        User::find($id)->profile()->update($data);
        return redirect('dashboard');
    }
}
