@extends('layout')
@section('content')
    @if(Session::get('useremail') !== null)
        <div>Welcome {{ Session::get('useremail') }}</div>
    @else
        {{-- <script>window.location="/login";</script> --}}
        <div>You are not logged in!</div>
    @endif

    {{-- <dashboard></dashboard> --}}
@endsection