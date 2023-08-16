<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @if (!Route::is('login.page') && !Route::is('register.page'))
        <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    @endif
    @yield('css')
</head>

<body>

    {{-- @if (Route::is('login.page') && Route::is('register.page'))
        @yield('content')
    @endif --}}

    @if (!Route::is('login.page') && !Route::is('register.page'))
        @include('components.navbar')
        {{-- inlcude sidebar --}}
        <div class="wrapper">
            @include('components.sidebar')
            <div class="content">
                <div class="dashboard">
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endif


    @if (!Route::is('login.page') && !Route::is('register.page'))
        <script src="{{ asset('js/backend.js') }}"></script>
    @endif
</body>

</html>
