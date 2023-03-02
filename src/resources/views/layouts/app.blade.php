<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    <link rel="stylesheet" href="{{asset('../../css/app.css')}}">--}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gecon</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <style>
        .gradient {
            background: linear-gradient(41deg, rgba(2, 0, 36, 1) 0%, rgba(48, 255, 0, 1) 35%, rgba(0, 212, 255, 1) 100%);
        }

        .h-10 {
            height: 10vh;
        }

        .h-90 {
            height: 90vh;
            overflow-y: auto;
        }

        .header-custom {
            z-index: 999;
            border-radius: 20px;
            padding: 20px;
        }

        @media (max-width: 991px) {
            .header-custom {
                background: white;
            }

        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="container-fluid gradient">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm gradient h-10">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <h1 class="m-0">
                        Gecon
                    </h1>
                    <p class="m-0 text-center">Education</p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse header-custom" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="dropdown-item ms-3" href="{{ route('home') }}">Каталог курсов</a>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <a class="dropdown-item ms-3" href="{{ route('home') }}">Преподавание</a>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else

                            <div class="d-flex align-items-center me-3 my-2">
                                <form action="{{ route('search.post') }}" method="post" style="width: 170px"
                                      class="position-relative">
                                    @csrf
                                    <button style="background: none; border: none; margin: 0"
                                            class="position-absolute top-0 start-0 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                    <input name="search_param" type="search" class="form-control form-control-sm  ps-5"
                                           placeholder="Поиск курса">
                                </form>
                            </div>

                            <div class="d-flex align-items-center ">
                                <div class="d-flex align-items-center me-3">
                                    <img style="height: 50px; width: 50px; border-radius: 50%"
                                         src="{{ \Illuminate\Support\Facades\Auth::user()->photo }}" alt="фото профиля">
                                    <a class="dropdown-item ms-2" href="{{ route('logout') }}">
                                        {{ \Illuminate\Support\Facades\Auth::user()->firstname }}
                                        {{ \Illuminate\Support\Facades\Auth::user()->lastname }}
                                    </a>
                                </div>

                                <a class="dropdown-item ms-auto" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="h-90">
        @yield('content')
    </main>
</div>
</body>
</html>
