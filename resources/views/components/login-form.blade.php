<div class="container">
    <form class="form" method="POST" action="{{ route('login.request') }}">
        @csrf
        <h1>Login</h1>
        <div class="">
            <label for="email">Email</label>
            <input type="email" name="email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            @if (Session::has('errorEmail'))
                <span>{{ Session::get('errorEmail') }}</span>
            @endif
        </div>

        <div class="input-box">
            <label for="password">Password</label>
            <input type="password" name="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
            @if (Session::has('errorPassword'))
                <span>{{ Session::get('errorPassword') }}</span>
            @endif
        </div>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="{{ route('register.page') }}">Register</a></p>
    </form>
</div>