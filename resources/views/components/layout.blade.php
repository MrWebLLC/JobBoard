<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    
</head>
<body class="bg-black text-white font-hanken pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4  border-b border-white/10">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/">Home</a>
                <a href="/careers">Careers</a>
                <a href="/salaries">Salaries</a>
                <a href="/companies">Companies</a>
            </div>
            @auth
                <div class="space-x-6 font-bold">
                    <a href="/jobs/create">Post a job</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            @endauth
            @guest
                <div class="space-x-6 font-bold">
                    <a href="{{ route('register') }}" class="hover:text-blue-800 transition-colors duration-300">Register</a>
                    <a href="{{ route('login') }}" class="hover:text-blue-800 transition-colors duration-300">Login</a>
                </div>
            @endguest
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            <x-notification />
            {{ $slot }}
        </main>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
        @method('delete')
    </form>
</body>
</html>