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
                    <form action="update" method="POST">
                        @csrf
                        @method('patch')
                        <div class="headerimg">
                            <label for="headerPic" class="headerpicLabel"><i class="fa fa-camera"></i></label>
                            <input type="file" id="headerPic" class="hideInput">
                            <img src="../../images/10.jpg" alt="">
                            <div class="profileimg">
                                <label for="profilePic" class="profilepicLabel"><i class="fa fa-camera"></i></label>
                                <input type="file" id="profilePic" class="hideInput">
                                <img src="../../images/8.jpg" alt="profilepic" />
                            </div>
                        </div>
                        <profile-input idinput="name" name="name" label="Name" data="{{ $user->name }}"></profile-input>
                        <profile-input idinput="bio" name="bio" label="Bio" number="160" data="{{ $profile->caption }}"></profile-input>
                        <profile-input idinput="location" name="location" label="Location" number="30" data="{{ $profile->location }}"></profile-input>
                        <profile-input idinput="website" name="website" label="Website" number="100" placeholder="Add your website" data=""></profile-input>
                        <profile-input idinput="dob" name="dob" label="Birth date" type="date" date data=""></profile-input>

                        



                        {{-- <register-input  idInput="bio" name="bio"  value="Bio" namefield textarea></register-input>
                        <register-input  idInput="email" name="email"  value="Email" type="email"></register-input>
                        <register-input  idInput="phone" name="phone"  value="Phone Number" type="number"></register-input>
                        <register-input  idinput="pass" name="password"  value="Password" type="password" ></register-input> --}}
                        {{-- <input type="text" value="{{ $userProfile->name }}"> --}}
                        {{-- <div>{{ $profile->caption }}</div> --}}
                        {{-- <div>{{ $user->name }}</div> --}}
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

