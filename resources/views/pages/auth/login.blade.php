@extends('layouts.app')
@section('title', 'Login')

@section('content')

    @if (Session::has('success'))
        <div class="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @include('components.login-form')
@endsection
