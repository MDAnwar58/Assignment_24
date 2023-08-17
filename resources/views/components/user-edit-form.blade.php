<div class="container">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-25">
                <label for="name">Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" placeholder="User Name" value="{{ $user->name }}">
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" placeholder="Email address" value="{{ $user->email }}">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>