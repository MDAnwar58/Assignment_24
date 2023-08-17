<div class="container">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-25">
                <label for="name">Name</label>
            </div>
            <div class="col-75">
                <input type="text" name="name" placeholder="User Name">
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" placeholder="Email address">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Password">
                @error('password') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password">Confirm Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                @error('password') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>