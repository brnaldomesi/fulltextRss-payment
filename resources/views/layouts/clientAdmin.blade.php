<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FetchRssFeeds') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clientAdmin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-client-admin">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    {{ __('FetchRSSFeeds.COM') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse ml-1" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-grey" href="#">
                                <i class="fa fa-tachometer"></i>{{ __('Admin') }}
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-grey" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-users"></i>
                                {{ __('Team Members') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-user-plus"></i>
                                    {{ __('Add a new team member') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-street-view"></i>
                                    {{ __('Manage team members') }}
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-grey" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-rss"></i>
                                {{ __('News Feed') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-plus-square"></i>
                                    {{ __('Create News Feed Channel') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-th-list"></i>
                                    {{ __('Manage News Feed Channels') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-cloud-download"></i>
                                    {{ __('Download Full text RSS OPML') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="">
                                    <i class="fa fa-link"></i>
                                    {{ __('Show me the master RSS Feed') }}
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-grey" href="#">
                                <i class="fa fa-pencil-square-o"></i>{{ __('Edit sender credentials') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-grey" href="#">
                                <i class="fa fa-line-chart"></i>{{ __('Statistics') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right left-auto" aria-labelledby="
                                navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-rotate-180"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <div class="well sidebar-nav">
                            <ul class="nav nav-list left-menu">
                                <li class="nav-header"><i class="fa fa-tachometer fa-2x"></i> Administration</li>
                                <li>
                                    <a href="#" class="@if(Request::segment(2)=='teams') active @endif">
                                        <i class="fa fa-users"></i> Team Members
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('feeds') }}"
                                        class="@if(Request::segment(2)=='feeds') active @endif">
                                        <i class="fa fa-rss"></i> News Feed Channels
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="@if(Request::segment(2)=='sender') active @endif">
                                        <i class="fa fa-pencil-square-o"></i> Sender Credentials
                                    </a>
                                </li>
                                <li class="nav-header"><i class="fa fa-line-chart fa-2x"></i> Statistics</li>
                                <li><a href="#"><i class="fa fa-area-chart"></i> Account Statistics</a></li>
                                <li><a href="#"><i class="fa fa-bar-chart"></i> Member Statistics</a></li>
                                <li class="nav-header"><i class="fa fa-user fa-2x"></i> Profile</li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-rotate-180"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
        </script>

        @if (config('app.env') == 'local')
        <!-- <script src="http://localhost:35729/livereload.js"></script> -->
        @endif

        <script src="{{ asset('js/theme.js') }}"></script>

        @yield('extraJs')
    </div>
</body>

</html>