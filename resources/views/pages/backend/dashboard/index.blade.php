@extends('layouts.app')
@section('title', 'Login')

@section('content')
    {{-- @if (Session::has('success'))
    <div class="alert">
        {{ Session::get('success') }}
    </div>
    @endif --}}
    <div class="card">
        <div style="text-align: center; margin-bottom: 10px;">
            <img src="{{ url('images/admin.png') }}" style="width: 150px; height: 150px; border: 2px solid black; border-radius: 100%;"
                alt="user profile">
        </div>
        <h3>{{ Auth::check() ? Auth::user()->name : '' }}</h3>
        <p>Email: {{ Auth::check() ? Auth::user()->email : '' }}</p>
    </div>
    <div class="card-event">
        <h2>Total Events</h2>
        <h1>{{ $events }}</h1>
    </div>
@endsection
