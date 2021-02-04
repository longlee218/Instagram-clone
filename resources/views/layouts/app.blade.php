<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') Instagram @show</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/instagram.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="nanobar load-bar" id="loading" style="position: fixed;">
        <div class="bar"></div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('svg/1200px-Instagram_logo.svg (1).png') }}" style="border-right: 2px solid; padding-right: 1rem" alt="Icon" class="pr-3" width="15%">
                    <span class="pl-3">Instagram-clone</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-commenting-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-compass fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       <img class="icon-user" src="{{ \Illuminate\Support\Facades\Auth::user()->profile->avatar }}" alt="user" width="60%">
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::id()) }}">
                                           Trang cá nhân
                                       </a>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           {{ __('Logout') }}
                                       </a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                           @csrf
                                       </form>
                                   </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <strong>Thành công! </strong>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>Thất bại! </strong>
                {{ session('error') }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
        <div id="modal"></div>
    </div>
</body>
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/nanobar-master/nanobar.min.js') }}"></script>
<script>
    function f() {
        let options = {
            classname: 'load-bar',
            id: 'loading'
        };
        let nanobar = new Nanobar( options );
        nanobar.go( 30 );
        nanobar.go( 76 );
        nanobar.go(100);
    }
    f();
</script>
</html>
@yield('script')
