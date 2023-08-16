<div class="sidebar">
    <ul class="sidebar-menu">
        <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ Route::is('user.create') ? 'active' : '' }}">
            <a href="{{ route('user.create') }}">User Create</a>
        </li>
        <li class="{{ Route::is('user.index') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}">Users</a>
        </li>
        <li class="{{ Route::is('admin.event.create') ? 'active' : '' }}">
            <a href="{{ route('admin.event.create') }}">Event Create</a>
        </li>
        <li class="{{ Route::is('admin.event') ? 'active' : '' }} {{ Route::is('admin.event.edit') ? 'active' : '' }} {{ Route::is('admin.event.show') ? 'active' : '' }}">
            <a href="{{ route('admin.event') }}">Events</a>
        </li>
    </ul>
</div>
