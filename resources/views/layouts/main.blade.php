<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Symply Events - @yield('title')</title>

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">

        <!-- JS -->
        <script src="/js/script.js"></script>
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            @yield('navbar', View::make('layouts.components.navbar'))
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                        <div class="alert alert-success w-100 mb-0 text-center" role="alert">
                            <span class="msg">{{ session('msg') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>

        <footer>
            @yield('navbar', View::make('layouts.components.footer'))
        </footer>
    </body>
</html>
