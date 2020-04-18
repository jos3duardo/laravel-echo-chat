<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>


    <title>{{env('APP_NAME')}}</title>
</head>
<body>
<div id="app">
    <nav>
    <div class="nav-wrapper">
        <a  href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>

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


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elems = document.querySelectorAll('.dropdown-trigger');
            let instances = M.Dropdown.init(elems);
        });
    </script>

</body>
</html>
