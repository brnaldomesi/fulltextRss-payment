<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('extracss')
  </head>
  <body>
    <div class="container-fluid">
      <header class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
          <div class="container-fluid">
            <a class="navbar-brand navbar-left" href="{{ url('/') }}">Fetch RSS Feeds</a>

            <div class="form-inline navbar-right">
              <ul class="navbar-nav mr-3">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/tour') }}">Tour</a>
                </li>
              </ul>
              <a class="btn btn-danger" href="#"><u>CREATE YOUR ACCOUNT</u></a>
            </div>
          </div>
        </nav>
      </header>

      <div id="main" class="row container" style="height: 800px;">
        @yield('content')
      </div>

      <footer class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
          <div class="container-fluid">
            © 2019 Fetch RSS Feeds
            <div class="form-inline navbar-right">
              Already a member?&nbsp<a href="#">Sign in</a>
            </div>
          </div>
        </nav>
      </footer>
    </div>

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('extrajs')
  </body>
</html>