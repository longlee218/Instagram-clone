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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('svg/instagram.svg') }}" style="border-right: 2px solid; padding-right: 1rem" alt="Icon" class="pr-3">
                    <span class="pl-3">Instagram</span>
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
                            <li class="nav-item dropdown">
                               <div style="display:flex;flex-direction:row; align-items:center;justify-content:center">
                                   <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                   </a>
                                   <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-commenting-o fa-2x ml-3" aria-hidden="true"></i>
                                   </a>
                                   <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-compass fa-2x ml-3" aria-hidden="true"></i>
                                   </a>
                                   <a id="" class="nav-link" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-heart-o fa-2x ml-3" aria-hidden="true"></i>
                                   </a>
                                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       <img class="icon-user" src="https://instagram.fhan2-6.fna.fbcdn.net/v/t51.2885-19/s150x150/123577524_204559801236810_3862763870381019523_n.jpg?_nc_ht=instagram.fhan2-6.fna.fbcdn.net&_nc_ohc=raJ6jruax4gAX9wnSx2&tp=1&oh=216862f69b1082ca4decc9d50e452265&oe=603ACB73" alt="user" width="15%">
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           {{ __('Logout') }}
                                       </a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                           @csrf
                                       </form>
                                   </div>
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
</html>
@yield('script')
