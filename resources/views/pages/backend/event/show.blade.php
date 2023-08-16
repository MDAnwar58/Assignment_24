@extends('layouts.app')
@section('title', 'Event Create')

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
    <header class="header">
        <h1>{{ $event->organization }} Event</h1>
    </header>
    <section class="event-list">
        <div class="event-card">
            <h2>{{ $event->title }}</h2>
            <p>Date: {{ date('d F, Y', strtotime($event->date)) }}</p>
            <p>Time: {{ date('h:i', strtotime($event->time)) }}</p>
            <p>Location: {{ $event->location }}</p>
            {{-- <div style="display: flex;">
                <p></p>

                @if ($rsvp)
                    true
                @else
                    false
                @endif
            </div> --}}
            <p>RSVP's User:
                @if ($event->rsvps->count() > 0)
                    @foreach ($event->rsvps as $rsvp)
                        <span>{{ $rsvp->user->name }}</span>
                    @endforeach
                @else
                    <span>(No RSVP)</span>
                @endif
            </p>
            <div style="display: flex;">
                <p>Allow users:</p>

                @if ($rsvp)
                    <form method="POST" action="{{ route('events.cancelRsvp', $event) }}">
                        @csrf
                        @method('DELETE')
                        {{-- <input type="text" name="user_id" value="{{ $rsvp->user_id }}"> --}}
                        <button type="submit" class="btn btn-sm btn-danger" style="margin: .5rem 0 0 .5rem;">Cancel
                            RSVP</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('events.rsvp', $event) }}">
                        @csrf
                        <select name="user_id" style="margin: 0 0 0 .5rem; padding: 3px 10px;">
                            <option value="">(Selete User)</option>
                            @foreach ($users as $user)
                                @if ($user->id == auth()->user()->id)
                                    @continue
                                @endif
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-success" style="margin: .5rem 0 0 .5rem;">RSVP</button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection
