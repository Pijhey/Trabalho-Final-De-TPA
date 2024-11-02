<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Loja de Console') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ __('Loja de Console') }}</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.view') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('Registro') }}</a>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Consoles') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('console.create') }}">{{ __('Criar') }}</a></li>
                        @endauth
                        <li><a class="dropdown-item" href="{{ route('console.view') }}">{{ __('Ver') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Marcas') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('brand.create') }}">{{ __('Criar') }}</a></li>
                        @endauth
                        <li><a class="dropdown-item" href="{{ route('brand.view') }}">{{ __('Ver') }}</a></li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">{{ __('Sair') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>

<main class="container py-4">
    {{-- Mensagens de Sucesso e Erro --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

    <footer class="bg-light text-center py-3 mt-4">
        <div class="container">
            <p>
                <a href="https://github.com/MatIketani" class="text-decoration-none">Mateus de Freitas Macedo</a> |
                <a href="https://github.com/Faelll13" class="text-decoration-none"> Rafael Mateus Baumgratz</a> |
                <a href="https://github.com/Pijhey" class="text-decoration-none">Pedro José Camilo</a> |
                <a href="#" class="text-decoration-none">André Carlos</a>
            </p>
        </div>
    </footer>
</main>
</body>
</html>
