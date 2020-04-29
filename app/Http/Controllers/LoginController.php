<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function authenticate(Request $request)
    {
        $this->middleware('auth');
    
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if($validate->fails()){
            return 'failed';
        }else {
            $loginuseremail = User::where('email', $request->username)->first();
            $loginuserphone = User::where('phone', $request->username)->first();
            $loginusername = User::where('username', $request->username)->first();
            if($loginuseremail){
                $request = array_merge($request->all(), [
                    'email' => $loginuseremail->email
                ]);
            }elseif($loginusername){
                $request = array_merge($request->all(), [
                    'email' => $loginusername->email
                ]);
            }elseif($loginuserphone){
                $request = array_merge($request->all(), [
                    'email' => $loginuserphone->email
                ]);
            }
            if($loginuseremail || $loginuserphone || $loginusername){
                $credentials = [
                    'email'=> $request['email'],
                    'password' => $request['password'],
                ];
                if (Auth::attempt($credentials)){
                    // Authentication passed...
                    // $request->session()->put('useremail', $request['email']);
                    return redirect()->intended('dashboard');
                    // return Auth::user();
                }else {
                    return 'User not found';
                }
            }else {
                return 'Are you sure you have signed up?';
            }
        }

    }
    public function logout() {
        $this->middleware('auth');
        Auth::logout();
        return redirect('/');
    }
    public function dashboard() {
        $this->middleware('auth');
        return view('dashboard');
    }
}

    
