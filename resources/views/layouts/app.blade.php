<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}| @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- css --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- font Bona Nova and Raleway --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">



    <style>
        /* *{
            border:1px solid blue;
        } */

        h1,h2,h3,h4,h5,h6{
            font-family: 'Bona Nova', serif;
            font-weight: bold
        }

        p,form{
            font-family: 'Raleway', sans-serif;
        }

        .cleaner-view-task p{
            font-size: 32px;
        }

        p.cleaning-task-list{
            font-weight: bold
        }

        /* .cleaner-page{
            width: 25rem
        } */

        .cleaner-page p{
            font-size: 32px;
        }

        .cleaner-page-button{
            border: 12px solid #2C462B;
            background-color: #448A47;
            height: 25rem;
            border-radius: 25px;
            width:25rem;
        }

        .img-md{
            height: 258px;
            width: 237px;
        }

        .progress_bar_table .col{
            height: 1rem;
            width: 1rem;
            border:1px solid black;
        }

        select.classic {
            background-image:
                /* linear-gradient(to top, transparent 50%, skyblue 50%), */
                linear-gradient(to right, transparent 50%, #448A47 50%);
            background-position:
                105px,
                105px;
            background-size:
                35px;
            background-repeat: no-repeat;
            border:1px solid #448A47;
            border-radius: 5px;
        }

        /* style */
        .modal-dialog{
            background-color: #FFFFFF
        }
        .modal-dialog p{
            font-size: 30px;
            font-weight: bold;
        }

        .modal-body img{
            width:50px;
            height:50px;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MRYR') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

    </div>
</body>
</html>
