@extends('layout')
@section('content')
<div class="container">
    <div class="login">
        <div class="row">
            <div class="col">
                <div class="login-box">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/twitterLogo.png') }}" alt="logo" width="50px">
                    </div>
                    <div class="heading mb-4">
                        Log in
                    </div>
                    <form action="login" method="POST">
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                        <register-input  idInput="username" name="username"  title="Username, Phone or Email" type="text"></register-input>
                        <register-input  idinput="pass" name="password"  title="Password" type="password" ></register-input>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection

