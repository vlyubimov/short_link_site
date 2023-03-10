<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
    <header class="container">
        <a href="/"><span class="logo">Short Link</span></a>
        <nav>
            <a href="/"><button class="main-btn">Главная</button></a>
            <a href="/about"><button class="main-btn">Про нас</button></a>
            <a href="/contact"><button class="main-btn">Контакты</button></a>
{{--            <a href=""><button class="main-btn">Войти</button></a>--}}

            @guest
                <a href="/login"><button class="main-btn">Войти</button></a>

                <a href="/register"><button class="main-btn">Регистрация</button></a>


            @else
                <a href="/home"><button class="main-btn">{{ Auth::user()->name }}</button></a>

                <form  action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <a href="#"><button type="submit" class="main-btn">Выйти</button></a>
                </form>

            @endguest
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer><p>Все права защищены</p></footer>
</body>
</html>
