<div class="container">
    <form action="{{ route('admin.event.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="organization">Organization</label>
            </div>
            <div class="col-75">
                <input type="text" name="organization" placeholder="Organization...">
                @error('organization')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="title">Title</label>
            </div>
            <div class="col-75">
                <input type="text" name="title" placeholder="Title...">
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Date</label>
            </div>
            <div class="col-75">
                <input type="date" name="date" placeholder="Title..">
                @error('date')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="time">Time</label>
            </div>
            <div class="col-75">
                <input type="time" name="time" placeholder="time">
                @error('time')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="location">Location</label>
            </div>
            <div class="col-75">
                <input type="text" name="location" placeholder="Location...">
                @error('location')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
                <textarea name="description" placeholder="Write descriptions..." style="height:200px"></textarea>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>