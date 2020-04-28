@extends('layout')
@section('content')
    @if(Auth::user()->email)
    <dashboard user="{{ Auth::user()->id }}"></dashboard>
    @else
        <script>windows.location="/login"</script>
    @endif
@endsection