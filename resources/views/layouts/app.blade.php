<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Adminajsr') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@if(!Auth::guest())
<nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white p-4">
{{--<nav class="navbar navbar-expand-lg navbar-light p-4" style="background-color: #e3f2fd;">--}}
    <a class="navbar-brand" href="{{ url('home') }}">Human Rights Focus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('home') }}">Home</a>
            </li>            <li class="nav-item">
                <a class="nav-link" href="{{ url('posts') }}">Updates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('localcontacts') }}">Local Contacts</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ url('board') }}">Board</a>--}}
            {{--</li>--}}
            {{--@if (Auth::user()->roles->whereIn('id', [1,2])->first())--}}
            @if (Auth::user()->roles->whereIn('id', 1)->first())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin') }}">Admin</a>
                </li>
            @endif
        </ul>
    </div>


    <!-- Right Side Of Navbar -->
    <div class="navbar-nav ml-auto">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>

                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    </div>
</nav>
    <div id="app" class="container p-2 mb-4">
        <main class="py-4 mb-4">

            <div class="row">
                @if(request()->route()->getName() == 'home' || request()->route()->getName() == 'posts.index' || request()->route()->getName() == 'posts.show' || request()->route()->getName() == 'sortCategory' )
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-md-4">
                        @section('sidebar')

                            <div class="container">

                                <h3>Activities</h3>
                                <p>In this category you can read about national and global activities organized by our organization, such as media events, seminars, other events, rallies and meetings.</p>
                                <h3>Local News</h3>
                                <p>Local news from our local contact person are presented in this category. For example location address changes, time changes, local events etc.</p>
                                <h3>Material</h3>
                                <p>Flyers, videos, petitions, external resources etc. are presented in this category. Check regularly for updates!</p>




                                <br>
                            </div>
                        @show
                    </div>
                @else
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                @endif


            </div>
        </main>
    </div>
        <footer class="footer mt-4 bg-dark text-white fixed-bottom">
            <div class="container p-4">
                <!--<small>&copy; 2019-<?php echo date("Y") ;?> Adminajsr | Need help? Contact <a class="text-warning" href="{{ url('contact') }}"> Support</a></small>-->
                <small>&copy; 2019-<?php echo date("Y") ;?> Adminajsr | Need help? Contact <a class="text-warning" href="mailto:support@adminajsr.com"> Support</a></small>
            </div>
        </footer>
@endif
</body>
</html>
