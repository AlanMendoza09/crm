<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/7083cd3d84.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container-fluid">
            {{--<aside class="control-sidebar control-sidebar-dark">
                <div class="text-center">
                    <img src="https://via.placeholder.com/100" alt="">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
                <div class="items-container">
                    <a href="{{ route('admin.users') }}">
                        <h6 class="menu-item"><i class="fas fa-users"></i> Users</h6>
                    </>
                    <a href="{{ route('admin.prospects') }}">
                        <h6 class="menu-item"><i class="fas fa-user-tie"></i> Prospects</h6>
                    </a>

                    <a href="{{ route('admin.projects') }}">
                        <h6 class="menu-item"><i class="fas fa-tasks"></i> Projects</h6>
                    </a>
                    <hr>
                </div>
              </aside>
              <!-- The sidebar's background -->
              <!-- This div must placed right after the sidebar for it to work-->
              <div class="control-sidebar-bg"></div>--}}
            <div class="sidebar sidebar-dark float-left">
                <div class="text-center">
                    <img src="https://via.placeholder.com/100" alt="">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
                <div class="items-container">
                    <a href="{{ route('admin.users') }}">
                        <h6 class="menu-item"><i class="fas fa-users"></i> Users</h6>
                    </>
                    <a href="{{ route('admin.prospects') }}">
                        <h6 class="menu-item"><i class="fas fa-user-tie"></i> Prospects</h6>
                    </a>

                    <a href="{{ route('admin.projects') }}">
                        <h6 class="menu-item"><i class="fas fa-tasks"></i> Projects</h6>
                    </a>
                    <hr>
                </div>
            </div>
            {{--End of sidebar--}}
            <div class="content">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('admin.layouts.scripts.scripts')
</body>
</html>
