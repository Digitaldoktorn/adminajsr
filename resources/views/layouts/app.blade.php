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
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
@if(!Auth::guest())
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('home') }}">Human Rights Focus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('posts') }}">Updates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('localcontacts') }}">Local Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('board') }}">Board</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Communication</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Domains</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Admin</a>
            </li>

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

    <div id="app" class="container-fluid">



        <main class="py-4">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    @section('sidebar')
                        <div class="container">
                            <h3>Material</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque distinctio eum molestias nemo pariatur quae quam. Blanditiis et facilis in nihil quisquam soluta vitae. Accusamus alias assumenda natus neque veritatis.</p>

                            {{--Only admin access--}}
                            @if(Auth::user()->role_id == 1)
                            <div class="form-group">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    Select file to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Upload file" name="submit">
                                </form>
                            </div>
                            @endif

                            <br>
                            <h3>Activities</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque distinctio eum molestias nemo pariatur quae quam. Blanditiis et facilis in nihil quisquam soluta vitae. Accusamus alias assumenda natus neque veritatis.</p>
                            <h3>Local News</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque distinctio eum molestias nemo pariatur quae quam. Blanditiis et facilis in nihil quisquam soluta vitae. Accusamus alias assumenda natus neque veritatis.</p>
                        </div>
                    @show
                </div>
            </div>
            <div class="modal-footer bg-dark text-white">
                <small>&copy; 2019-<?php echo date("Y") ;?> Adminajsr | Need help? Contact <a class="text-warning" href="{{ url('contact') }}"> Support</a></small>
            </div>
        </main>
    </div>
@endif
</body>
</html>
