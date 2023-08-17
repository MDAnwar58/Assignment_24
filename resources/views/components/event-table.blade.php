<div class="create_button">
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary">Create Event</a>
</div>
<div class="table-container" style="overflow-x:auto;">
    <div style="display: flex; justify-content: space-between;">
        <form action="{{ route('admin.event') }}" method="GET">
            <select name="filter" style="padding: 4px 5px;">
                <option value="">(Category Filter)</option>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                @else
                    <option value="">No Category</option>
                @endif
            </select>
            <button type="submit" class="btn btn-sm btn-dark">Filter</button>
        </form>
        <form action="{{ route('admin.event') }}" method="GET">
            <input type="search" name="search" placeholder="search" style="padding: 3px 10px;">
            <button type="submit" class="btn btn-sm btn-dark">Search</button>
        </form>
    </div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Organization</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($events->count() > 0)
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $event->organization }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ date('d-m-Y', strtotime($event->date)) }}</td>
                        <td>{{ date('h:i', strtotime($event->time)) }}</td>
                        <td>{{ $event->location }}</td>
                        <td>
                            <a href="{{ route('admin.event.edit', $event->id) }}"
                                class="btn btn-success btn-sm">Edit</a>
                            <br>
                            <br>
                            <a href="{{ route('admin.event.show', $event->id) }}"
                                class="btn btn-primary btn-sm">Show</a>
                            <br>
                            <br>
                            <a href="{{ route('admin.event.destroy', $event->id) }}"
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
    @if ($events->count() > 0)
        {{ $events->appends(request()->all())->links() }}
    @endif
</div>