<html>
    <head>
        {{--<title>App Name - @yield('title')</title>--}}
        <title>My Blog</title>
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        {{--@section('sidebar')--}}
            {{--This is the master sidebar.--}}
        {{--@show--}}

        <div class="container">
            <h1>This is my site</h1>
            @yield('content')

            <div class="footer">
                <ul>
                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>