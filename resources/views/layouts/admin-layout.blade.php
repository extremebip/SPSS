<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script><script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js" defer></script>

    @yield('script')

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/font.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/layout.css') }}">

    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand py-0 my-0" href="{{ route('adminpage') }}">
                    <img src="{{asset('storage/Assets/favicon_dan_icon.png')}}" width="50" height="50" class="d-inline-block" alt="SPSS-logo">
                    <b>{{ config('app.name', 'SPSS') }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::guard('admin')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team-list') }}">
                                    Team List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team-tahap-1') }}">
                                    Team Tahap 1
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team-tahap-2') }}">
                                    Team Tahap 2
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('team-final') }}">
                                    Team Final
                                </a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (!Auth::guard('admin')->check() || Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                            </li>
                        @else

                            <li class="nav-item spss-marquee">
                                <a class="nav-link">
                                    @yield('page')
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->NamaLengkap }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @yield('dropdown-menu')

                                    <a class="dropdown-item" href="{{ route('admin-profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <img src="{{ asset('storage/Assets/home.png') }}" alt="" style="position: fixed; right: 0; top: 0; z-index: -1">
            @yield('content')
        </main>

        <footer class="bd-footer text-muted">
            <div class="container-fluid p-3 p-md-3">
                <ul class="bd-footer-links">
                    <li><a href="https://spssbinus.com">SPSS Binus</a></li>
                </ul>
                <p>Copyright &copy; SPSS Binus 2019</p>
            </div>
        </footer>
    </div>
</body>
</html>