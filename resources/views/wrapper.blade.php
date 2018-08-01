<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="" class="navbar-brand">Shop!</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="badge badge-pill badge-light">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            <div class="container text-center">
                <h1>Welcome to our Shop!</h1>
            </div>
        </header>
        @yield('content')
        @yield('scripts')
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
