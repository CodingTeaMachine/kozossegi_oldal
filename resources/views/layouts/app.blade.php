<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @yield('css')
    <title>Visage!</title>
</head>
<body>
    @section('content')
    @show
</body>
</html>
