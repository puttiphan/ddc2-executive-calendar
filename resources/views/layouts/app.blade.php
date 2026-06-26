<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDC2 Executive Calendar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

@include('layouts.navigation')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-white border-end min-vh-100 p-0">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-10 p-4">

            @yield('content')

            @include('layouts.footer')

        </div>

    </div>
</div>

</body>
</html>