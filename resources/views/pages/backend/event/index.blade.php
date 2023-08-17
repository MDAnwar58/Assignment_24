@extends('layouts.app')
@section('title', 'Events')

@section('css')
    <style>
        .dashboard {
            display: block;
            flex-wrap: nowrap;
            gap: 0;
        }
    </style>
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert" id="alert">
            <p><button type="button" onclick="document.getElementById('alert').classList.add('d-none')"
                    class="btn btn-sm">Cancel</button>{{ Session::get('success') }}</p>
        </div>
    @endif
    @include('components.event-table')
@endsection
