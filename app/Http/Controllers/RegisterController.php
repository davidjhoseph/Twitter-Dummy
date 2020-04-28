<?php

namespace App\Http\Controllers;

use App\{User, Profile};
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.register');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:8'],
            'email' => ['required', 'min:8', 'unique:users'],
            'phone' => ['required', 'min:8', 'unique:users'],
            'password' =>['required', 'min:8']

        ]);
        // $email = User::where('email', $data['email'])->get();
        
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            $user->profile()->create();
            
            //Not Working as expected
            $credentials = [
                'email'=> $data['email'],
                'password' => $data['password'],
            ];
            if (Auth::attempt($credentials, $remember = true)){
                return redirect()->intended('dashboard');
            }else {
                return 'Please try again';
            }

            // Auth::loginUsingId();
            // return UserResource::collection(User::all());

    }

}
