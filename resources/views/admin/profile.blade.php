<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sample') }}</title>

  <!-- Scripts -->
  <script src="{{  asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body>
  <div id="app">



    <header>
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="#">
            <i class="fas fa-book-reader fa-2x mx-3"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-right text-light"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mr-auto"></div>
            <ul class="navbar-nav ml-auto py-3 py-md-0">
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                @auth
                @if(Auth::user()->role == 'admin')
                <a class="nav-link" href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
                @endif
                @endauth
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                              @auth
                                  @if(Auth::user()->role == 'normal')
                                <a class="nav-link" href="{{ url('/Articles') }}">{{ __('Article') }}</a>
                                @endif
                                @if(Auth::user()->role == 'staff')
                                <a class="nav-link" href="{{ url('/articles') }}">{{ __('Article') }}</a>
                                @endif
                                @if(Auth::user()->role == 'admin')
                                <a class="nav-link" href="{{ url('/articles') }}">{{ __('Article') }}</a>
                                @endif

                                    @endauth
                            </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                @auth
                <a href="{{ url('/home') }}" class="nav-link">{{ __('Blogs') }}</a>
                @endauth
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                @auth
                @if(Auth::user()->role == 'normal')
                <a class="nav-link ms-auto" href="{{ url('/profile') }}">Profile</a>
                @endif
                @if(Auth::user()->role == 'staff')
                <a class="nav-link ms-auto" href="{{ url('/myBlog') }}">Profile</a>
                @endif
                @if(Auth::user()->role == 'admin')
                <a class="nav-link ms-auto" href="{{ url('/adminprofile') }}">Profile</a>
                @endif
                @endauth
              </li>
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                @auth
                @if(Auth::user()->role == 'normal')
                <a class="nav-link" href="{{ url('/Upgrade') }}">{{ __('Upgrade') }}</a>
                @endif
                @endauth
              </li>

            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                @auth
                @if(Auth::user()->role == 'normal')
                <a class="nav-link ms-auto" href="{{ url('/profile') }}"><i class='bx bx-face'></i> Hi, {{Auth::user()->fname}}</a>
                @endif
                @if(Auth::user()->role == 'staff')
                <a class="nav-link ms-auto" href="{{ url('/myBlog') }}"><i class='bx bx-face'></i> Hi, {{Auth::user()->fname}}</a>
                @endif
                @if(Auth::user()->role == 'admin')
                <a class="nav-link ms-auto" href="{{ url('/adminprofile') }}"><i class='bx bx-face'></i> Hi, {{Auth::user()->fname}}</a>
                @endif
                @endauth
              </li>
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item " onclick="event.preventDefault();
																																				document.getElementById('logout-form').submit();">

                <div class="menu menu-right">
                  <a class="item" href="{{ route('logout') }}">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <div class="container">
      <main class="py-4">
        <div class="container">
          <div class="main-body">


            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://resolution-conflits.protegez-vous.ca/wp-content/uploads/2020/05/testimony.png" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4>{{ Auth::user()->fname }}</h4>
                        <p class="text-secondary mb-1">{{ Auth::user()->role }}</p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->fname }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->email }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Job</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->job }}
                      </div>
                    </div>
                    <hr>


                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Country</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->country }}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Gender</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->gender }}
                      </div>
                    </div>


                  </div>
                </div>




              </div>
            </div>

          </div>
        </div>
      </main>
    </div>
</body>

</html>