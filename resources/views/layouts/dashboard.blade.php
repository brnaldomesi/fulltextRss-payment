<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Full Text RSS Feeds Engine & API | Content Aggregator</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/theme.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-client-admin">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <h1>{{ __('Full Text RSS Feeds') }}<sup>{{ __('Engine & API') }}</sup></h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse ml-1" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif"">
                            <a class="nav-link" href="#">
                                <i class="fa fa-tachometer"></i>{{ __('Admin') }}
                            </a>
                        </li>

                        <li class="nav-item dropdown @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif"">
                            <a class="nav-link dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="#">
                                <i class="fa fa-users"></i>
                                {{ __('Team Members') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('users.new') }} @endif" onclick="">
                                    <i class="fa fa-user-plus"></i>
                                    {{ __('Add a new team member') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('users') }} @endif" onclick="">
                                    <i class="fa fa-street-view"></i>
                                    {{ __('Manage team members') }}
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif">
                            <a class="nav-link dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="#">
                                <i class="fa fa-rss"></i>
                                {{ __('News Feed') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right ">
                                <a class="dropdown-item " href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('feeds.new') }} @endif" onclick="">
                                    <i class="fa fa-plus-square"></i>
                                    {{ __('Create News Feed Channel') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('feeds') }} @endif" onclick="">
                                    <i class="fa fa-th-list"></i>
                                    {{ __('Manage News Feed Channels') }}
                                </a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else # @endif" onclick="">
                                    <i class="fa fa-cloud-download"></i>
                                    {{ __('Download Full text RSS OPML') }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else # @endif" onclick="">
                                    <i class="fa fa-link"></i>
                                    {{ __('Show me the master RSS Feed') }}
                                </a> --}}
                            </div>
                        </li>

                        <li class="nav-item @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif">
                            <a class="nav-link" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('smtp') }} @endif">
                                <i class="fa fa-pencil-square-o"></i>{{ __('Edit sender credentials') }}
                            </a>
                        </li>
                        <li class="nav-item @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif">
                          <a class="nav-link" href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('transactions') }} @endif">
                              <i class="fa fa-dollar-sign"></i>{{ __('Transactions') }}
                          </a>
                      </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right left-auto" >
                                <a class="dropdown-item" href="{{ route('users.pwdEdit') }}">
                                    <i class="fa fa-lock"></i>
                                    {{ __('Change password') }}
                                </a>
                                <div class="dropdown-divider"></div>
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
                    <div class="col-2 @if(Auth::user() && Auth::user()->status == 'pending') d-none @endif">
                        <div class="well sidebar-nav">
                            <ul class="nav nav-list left-menu">
                                <li class="nav-header"><i class="fa fa-tachometer fa-2x"></i> Administration</li>
                                <li>
                                    <a href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('users') }} @endif" class="@if(Request::segment(2)=='users') active @endif">
                                        <i class="fa fa-users"></i> Team Members
                                    </a>
                                </li>
                                <li>
                                    <a href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('feeds') }} @endif"
                                        class="@if(Request::segment(2)=='feeds') active @endif">
                                        <i class="fa fa-rss"></i> News Feed Channels
                                    </a>
                                </li>
                                <li>
                                    <a href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('smtp') }} @endif" class="@if(Request::segment(2)=='smtp') active @endif">
                                        <i class="fa fa-pencil-square-o"></i> Sender Credentials
                                    </a>
                                </li>
                                <li>
                                    <a href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('transactions') }} @endif" class="@if(Request::segment(2)=='transactions') active @endif">
                                        <i class="fa fa-dollar-sign"></i> Transactions
                                    </a>
                                </li>
                                <li>
                                    <a href="@if(Auth::user() && Auth::user()->status == 'pending') # @else {{ route('userplan') }} @endif" class="@if(Request::segment(2)=='userplan') active @endif">
                                        <i class="fa fa-edit"></i> My Plan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

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

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-center mt-8-em",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    </script>

                    <div class="@if(Auth::user() && Auth::user()->status == 'pending') col-12 @else col-10 @endif">
                      <div class="container @if(Auth::user() && Auth::user()->status == 'active') ml-0 @endif">
                        <div class="row justify-content-center">
                          @yield('content')
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    @if (config('app.env') == 'local')
      <script src="http://localhost:35729/livereload.js"></script>
    @endif

    @yield('extraJs')
</body>

</html>