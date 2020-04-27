@extends('layout')
@section('content')
<div class="container">
    <div class="register">
        <div class="row">
            <div class="col">
                <div class="register-box">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/twitterLogo.png') }}" alt="logo" width="50px">
                    </div>
                    <div class="heading mb-4">
                        Create your account
                    </div>
                    <form action="register" method="POST">
                        @csrf
                        <register-input  idInput="name" name="name"  title="Name" namefield></register-input>
                        <register-input  idInput="email" name="email"  title="Email" type="email" value="{{ old('email') }}"></register-input>
                        <register-input  idInput="phone" name="phone"  title="Phone Number" type="number"></register-input>
                        <register-input  idinput="pass" name="password"  title="Password" type="password" ></register-input>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection

