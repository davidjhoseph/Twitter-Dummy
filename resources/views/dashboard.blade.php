@extends('layout')
@section('content')
    @if(Auth::user()->email)
    <dashboard user="{{ Auth::user() }}"></dashboard>
    @else
        <script>windows.location="/login"</script>
    @endif
@endsection