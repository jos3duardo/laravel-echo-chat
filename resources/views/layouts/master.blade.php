<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>


    <title>{{env('APP_NAME')}}</title>
    <style type="text/css">
        .chat {
            padding: 0;
        }
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .chat li.left .chat-body {
            margin-left: 100px;
        }
        .chat li.right .chat-body {
            text-align: right;
            margin-right: 100px;
        }
        .card-content {
            overflow-y: scroll;
            height: 400px;
        }
        .collection {
            margin: .5rem 0 1rem 0;
            border: none;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }
    </style>
</head>
<body>
<div id="app">
    <nav>
        <div class="nav-wrapper">
        <a  href="{{ route('chat.rooms.index') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!-- Authentication Links -->
            @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>

                <li class="nav-item dropdown">
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                        {{ Auth::user()->name }}
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
    </nav>
    @yield('content')
</div>

    @yield('pre-script')

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.dropdown-trigger');
            let instances = M.Dropdown.init(elems);
        });
    </script>

</body>
</html>
