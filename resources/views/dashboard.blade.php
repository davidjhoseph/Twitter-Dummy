@extends('layout')
@section('content')
    @if(Auth::user()->email)
    <dashboard userid="{{ Auth::user()->id }}"></dashboard>
    @else
        <script>window.location="/login"</script>
    @endif
@endsection