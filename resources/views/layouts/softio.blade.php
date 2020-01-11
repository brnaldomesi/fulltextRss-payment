<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('description')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!--Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('softio/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('softio/css/plugin.css') }}" rel="stylesheet">
    <link href="{{ asset('softio/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('softio/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('softio/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ mix('css/home.css') }}" rel="stylesheet">
    
    @yield('extraCss')
</head>
<body class="index3">
  <div class="mainmenu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">                 
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
              <img src="{{ asset('softio/images/logo.svg') }}" style="height:50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fixed-height" id="main_menu">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link @if(Request::segment(1)=='home' || Request::segment(1)=='') active @endif" href="/">{{ __('Home') }}</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link @if(Request::segment(1)=='tour') active @endif" href="{{ route('tour') }}">{{ __('How It Works') }}</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link @if(Request::segment(1)=='usecases') active @endif" href="{{ route('usecases') }}">{{ __('Use Cases') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(Request::segment(1)=='pricing') active @endif" href="{{ route('pricing') }}">{{ __('Pricing') }}</a>
                </li>
                <li class="nav-item mr-5">
                  <a class="nav-link @if(Request::segment(1)=='contact') active @endif" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                </li>
              </ul>
              <a class="base-btn3 @if(Request::segment(1)=='login') active @endif" href="{{ route('login') }}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                <a class="base-btn1 ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <main class="home-content">
    @yield('content')
  </main>

  <!-- Footer Area Start -->
  <footer class="footer p-0" id="footer">
	
		<div class="copy-bg m-0">
			<div class="container">
				<div class="d-flex flex-wrap">
						<div class="left-area pr-5">
							<p>© 2019 ContentAggregator.com
							</p>
						</div>
          
						<div class="left-area px-3">
							<a class="text-white" href="/">Home</a>
						</div>
					
						<div class="left-area px-3">
							<a class="text-white" href="/tour">How It Works</a>
						</div>
					
						<div class="left-area px-3">
							<a class="text-white" href="/usecases">Use Cases</a>
						</div>
					
						<div class="left-area px-3">
							<a class="text-white" href="/pricing">Pricing</a>
						</div>
					
						<div class="left-area px-3">
							<a class="text-white" href="/contact">Contact</a>
						</div>
					
				</div>
			</div>
		</div>
	</footer> 
	<!-- Footer Area End -->

	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->

  <!-- jquery -->
	<script src="softio/js/jquery.js"></script>
	<!-- popper -->
	<script src="softio/js/popper.min.js"></script>
	<!-- bootstrap -->
	<script src="softio/js/bootstrap.min.js"></script>
	<!-- plugin js-->
	<script src="softio/js/plugin.js"></script>
	<!-- main -->
  <script src="softio/js/main.js"></script>
  
  @yield('extraJs')
</body>
</html>
