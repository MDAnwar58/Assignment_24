<nav class="navbar">
    <div class="nav-brand">Admin Panel</div>
    <div class="user-dropdown">
        <button class="user-btn">{{ Auth::check() ? Auth::user()->name : '' }}</button>
        <div class="user-menu">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-max-md-manus-link">Dashboard</a>
            <a href="{{ route('admin.event.create') }}" class="sidebar-max-md-manus-link">Event Create</a>
            <a href="{{ route('admin.event') }}" class="sidebar-max-md-manus-link">Event</a>
            <a href="{{ route('logout') }}" class="sidebar-manus-link">Logout</a>
        </div>
    </div>
</nav>
