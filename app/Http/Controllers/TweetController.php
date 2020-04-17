<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\{User, Tweets};

class TweetController extends Controller
{
    public function index() {
        return Tweets::orderBy('id', 'desc')->get();
    }
}
