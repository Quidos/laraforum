<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laraforum</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-slate-200">
    <nav class="flex bg-cyan-400">
        <div class="p-1 grow">
            <div class="flex">
                <a class="mr-2" href="{{ route('categories') }}">Home</a>
                @auth
                    <a class="mr-2" href="{{ route('messages', Auth::user()->id) }}">Messages</a>
                @endauth
            </div>
        </div>
        @auth
            <a class="p-1" href="{{ route('user.show', Auth::user()->name) }}">Profile</a>
        @endauth
        @guest
            <a class="p-1" href="{{ route('registration') }}">Register</a>
            <a class="p-1" href="{{ route('login') }}">Log in</a>
        @endguest
        @auth
            <form action="{{ route('login') }}" method="post">
                @csrf
                @method('delete')
                <input class="p-1 cursor-pointer" type="submit" value="Log out">
            </form>
        @endauth
    </nav>
    <div class="m-6">
        @yield('content')
    </div>
</body>
@stack('scripts')
@livewireScripts
</html>
