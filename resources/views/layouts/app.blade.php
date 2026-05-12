<!DOCTYPE html>
<html lang="en">

<head>

    <title>Laravel 11 Task list App</title>
    @yield('syles')
</head>

<body>
    <h1>@yield('title')</h1>

    <div>
        @if (session()->has('success'))
            <p style="color: green; ">{{ session('success') }}</p>
        @endif


        @yield('content')
    </div>

</body>

</html>
