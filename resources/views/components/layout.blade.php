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
    <body class="font-sans antialiased min-h-screen">
        <header class=" bg-gray-100 p-2 flex justify-between items-center">
            <a href="/">
                <p>Logo</p>
            </a>
            @if (session("user"))
                <div class="flex gap-2 items-center">
                    <a href="{{route("user.show", session("user"))}}">
                        <x-iconoir-profile-circle />
                    </a>
                    <form action="{{route("login.destroy")}}" method="POST" class="flex items-center">
                        @csrf
                        @method("DELETE")
                        <button>
                            <x-iconoir-log-out />
                        </button>
                    </form>
                    <a href="{{route("home")}}">
                        <x-iconoir-shopping-code />
                    </a>
                </div>
            @endif
        </header>
        <main class="h-[95vh]">
            {{ $slot }}
        </main>
        <footer>

        </footer>
    </body>
</html>
