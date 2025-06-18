<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
 <body class="font-sans text-gray-900 antialiased">
    
    <video autoplay muted loop id="bg-video" style="
        position: fixed;
        top: 0; left: 0;
        width: 100vw; height: 100vh;
        object-fit: cover;
        z-index: -1;
    ">
        <source src="https://res.cloudinary.com/dandumvvy/video/upload/v1749744851/pzmpz/fv6w3sz8nezcwbclm3gl.mp4" type="video/mp4">
    </video>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
