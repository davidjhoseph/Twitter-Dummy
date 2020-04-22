@extends('layout')
@section('content')
    @if(isset(Auth::user()->email))
        <div>Welcome {{ Auth::user()->email }}</div>
    @else
        <script>window.location="/login";</script>
        <div>You are not logged in!</div>
    @endif

    {{-- <dashboard></dashboard> --}}
@endsection