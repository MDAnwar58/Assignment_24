<div class="container">
    <form class="form" method="POST" action="{{ route('register.request') }}">
        @csrf
        <h1>Registration</h1>
        <div class="input-box">
            <label for="name">Full name</label>
            <input type="text" name="name">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <label for="Password">Password</label>
            <input type="password" name="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation">
            @error('password_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="{{ route('login.page') }}">Login</a></p>
    </form>
</div>