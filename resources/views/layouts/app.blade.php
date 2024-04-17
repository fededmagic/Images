<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <title>@yield('title', 'Online Store')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="#">Foto dal drone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{route('home.index')}}">Home</a>
          <a class="nav-link active" href="{{route('home.about')}}">About</a>
          <a class="nav-link active" href="{{route('images.index')}}">Images</a>
          <a class="nav-link active" href="{{route('myaccount.orders')}}">Orders</a>

          @if(Auth::user() && Auth::user()->getRole() == "admin")
          <a class="nav-link active" href="{{route('admin.home.index')}}">Admin</a>
          @endif
          
          @if(Auth::user())
          <a class="nav-link active" href="{{route('cart.index')}}">Cart</a>
          <a class="nav-link active" href="{{route('myaccount.balance')}}">Balance</a>
          @endif

          @guest
          <a class="nav-link active" href="{{route('login')}}">Login</a>
          <a class="nav-link active" href="{{route('register')}}">Register</a>

          @else
          <form id = "logout" method = "POST" action = "{{ route("logout") }}">
            <a class="nav-link active" onclick = "document.getElementById('logout').submit()" role = "button">Logout</a>
            @csrf
          </form>
          @endguest

          <a class="nav-link active" href="{{route('images.index')}}"></a>

        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white relative-bottom">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="https://www.youtube.com/@fededdrone4855">
          Federico Dutto
        </a> - <b>Shot by DJI Mavic Mini</b>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
