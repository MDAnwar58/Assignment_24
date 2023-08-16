@extends('layouts.app')
@section('title', 'Users')

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
    <div class="create_button">
        <a href="{{ route('user.create') }}" class="btn btn-primary">User Added</a>
    </div>
    <div class="table-container" style="overflow-x:auto;">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                    @if ($user->email === Auth::user()->email)
                        @continue
                    @endif
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <br>
                                <br>
                                <a href="{{ route('admin.user.destroy', $user->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="8">Event not found</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if ($users->count() > 0)
            {{ $users->links() }}
        @endif
    </div>
@endsection
