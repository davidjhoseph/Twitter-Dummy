<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index() {
        return collect([
            
           'user' => User::find(11),
            'profile' => User::find(11)->profile
        ]);

    }
    public function edit() {
        $user = User::find(11);
        $profile = User::find(11)->profile;
        return view('editprofile', compact('user','profile'));
    }
    
    public function update (Request $request) {
        if(request('name')){
            $user = $request->validate([
                'name' => ['min:5']
            ]);
            User::find(11)->update($user);
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
            User::find(11)->profile()->update(array_merge($data, [
                'profileImg' =>  $profilepicPath
            ]));
            return redirect('dashboard');


        }elseif(request('headerpic')){
            $headerpicpicPath = request('headerpic')->store('profile', 'public');
            User::find(11)->profile()->update(array_merge($data, [
                'headerImg' =>  $headerpicpicPath
            ]));
            return redirect('dashboard');

        }elseif(request('profilepic') && request('headerpic')) {
            $profilepicPath = request('profilepic')->store('profile', 'public');
            $headerpicpicPath = request('headerpic')->store('profile', 'public');
            User::find(11)->profile()->update(array_merge($data, [
                'profileImg' =>  $profilepicPath,
                'headerImg' =>  $headerpicpicPath
            ]));
            return redirect('dashboard');
        }
        User::find(11)->profile()->update($data);
        return redirect('dashboard');
    }
}
