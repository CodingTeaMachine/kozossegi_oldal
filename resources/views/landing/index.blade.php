@php
    /**
     * @var array{userData: array} $response
     */
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
            <table class="border-2 border-red-500">
                <tr>
                    <th>Vez.</th>
                    <th>Ker.</th>
                </tr>
                @foreach($response['userData'] as $userData)
                    <tr> <td>{{$userData->vezeteknev}} </td> <td>{{$userData->keresztnev}}</td> </tr>
                @endforeach
            </table>

    </body>
</html>
