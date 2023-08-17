@extends('layouts.app')
@section('title', 'Event Show')

@section('css')

    <style>
        .dashboard {
            display: block;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        /* Event list styles */

        .event-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .event-card {
            background-color: #fff;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            width: 100%;
        }

        .event-card h2 {
            margin-top: 10px;
        }

        .event-card p {
            margin: 10px 0;
            color: #666;
        }
    </style>

@endsection

@section('content')
    @include('components.event-show')
@endsection
