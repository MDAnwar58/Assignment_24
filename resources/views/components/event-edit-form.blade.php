<div class="container">
    <form action="{{ route('admin.event.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-25">
                <label for="organization">Organization</label>
            </div>
            <div class="col-75">
                <input type="text" name="organization" placeholder="Organization..." value="{{ $event->organization }}">
                @error('organization') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="title">Title</label>
            </div>
            <div class="col-75">
                <input type="text" name="title" placeholder="Title..." value="{{ $event->title }}">
                @error('title') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Date</label>
            </div>
            <div class="col-75">
                <input type="date" name="date" value="{{ $event->date }}">
                @error('date') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="time">Time</label>
            </div>
            <div class="col-75">
                <input type="time" name="time" value="{{ $event->time }}">
                @error('time') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="location">Location</label>
            </div>
            <div class="col-75">
                <input type="text" name="location" placeholder="Location..."  value="{{ $event->location }}">
                @error('location') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
                <textarea name="description" placeholder="Write descriptions..." style="height:200px">{{ $event->description }}</textarea>
                @error('description') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>