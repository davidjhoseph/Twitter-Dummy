@extends('layout')
@section('content')
<div class="container">
    <div class="profileedit">
        <div class="row">
            <div class="col">
                <div class="profile-box">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/twitterLogo.png') }}" alt="logo" width="50px">
                    </div>
                    <div class="heading mb-4">
                        Edit Profile
                    </div>
                    <form action="update/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="headerimg">
                            <label for="headerPic" class="headerpicLabel">OOO<i class="fa fa-camera"></i></label>
                            <input type="file" id="headerPic" class="hideInput" name="headerpic">
                            @if($profile->headerImg)
                            <img src="{{ asset("storage/{$profile->headerImg}") }}" alt="">
                            @else
                            <img src="{{ asset("images/10.jpg") }}" alt="">
                            @endif
                            <div class="profileimg">
                                <label for="profilePic" class="profilepicLabel">OOO<i class="fa fa-camera"></i></label>
                                <input type="file" id="profilePic" class="hideInput" name="profilepic">
                                @if($profile->profileImg)
                                <img src="{{ asset("storage/{$profile->profileImg}") }}" alt="">
                                @else
                                <img src="{{ asset("images/8.jpg") }}" alt="">
                                @endif
                            </div>
                        </div>
                        <profile-input idinput="name" name="name" label="Name" data="{{ $user->name }}" idinput="name"></profile-input>
                        <profile-input idinput="username" name="username" label="Username" number="50" data="{{ $user->username }}"></profile-input>
                        <profile-input idinput="bio" name="caption" label="Bio" number="160" data="{{ $profile->caption }}" idinput="bio"></profile-input>
                        <profile-input idinput="location" name="location" label="Location" number="30" data="{{ $profile->location }}" idinput="location"></profile-input>
                        <profile-input idinput="website" name="website" label="Website" number="100" placeholder="Add your website" data="" idinput="website"></profile-input>
                        <profile-input idinput="dob" name="dob" label="Birth date" type="date" date data="" idinput="dob"></profile-input>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection

