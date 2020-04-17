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
}
