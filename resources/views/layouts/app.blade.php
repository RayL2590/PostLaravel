<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="" class="p-3">Acceuil</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Tableau de Bord</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Postes</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Déconnection</button>
                    </form>
                </li>
            @endauth

            @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Connection</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Inscription</a>
            </li>
            @endguest
        </ul>
    </nav>
@yield('content')
</body>
</html>
