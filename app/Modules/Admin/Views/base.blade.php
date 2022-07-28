<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App - @yield('title')</title>

    {{-- link style css --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>

<body>
    @section('sidebar')
        This is the master sidebar.
    @show

    <div class="container">
        @yield('main')
    </div>

    @section('footer')
        This is the master footer.
    @show
</body>

</html>
