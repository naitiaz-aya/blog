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
  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('css/create.css') }}" rel="stylesheet"> -->

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
      <div class="row">
        <div class="col-md-12">
          <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
              <div class="profile-header">
                <!-- BEGIN profile-header-cover -->
                <div class="profile-header-cover"></div>
                <!-- END profile-header-cover -->
                <!-- BEGIN profile-header-content -->
                <div class="profile-header-content">
                  <!-- BEGIN profile-header-img -->
                  <div class="profile-header-img">
                    <img src="https://www.kindpng.com/picc/m/78-785827_user-profile-avatar-login-account-male-user-icon.png" alt="user">
                  </div>
                  <!-- END profile-header-img -->
                  <!-- BEGIN profile-header-info -->
                  <div class="profile-header-info">
                  <h4 class="m-t-10 m-b-5">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                    <p class="m-b-10"><i class='bx bxs-city' style='color:#ffffff'  ></i> {{ Auth::user()->country }}</p>
                    <p class="m-b-10"><i class='bx bx-user' style='color:#ffffff'  ></i> {{ Auth::user()->gender }}</p>
                    <p class="m-b-10"><i class='bx bxs-business' style='color:#ffffff'  ></i> {{ Auth::user()->job }}</p>
                    <p class="m-b-10"><i class='bx bx-mail-send' style='color:#ffffff' ></i> {{ Auth::user()->email }}</p>
                    
                  </div>
                  <!-- END profile-header-info -->
                </div>
                <!-- END profile-header-content -->
                <!-- BEGIN profile-header-tab -->
                <ul class="profile-header-tab nav nav-tabs">
                  <li class="nav-item"><a href="#profile-post" class="nav-link active show" data-toggle="tab">POSTS</a></li>
                  
                </ul>
                <!-- END profile-header-tab -->
              </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
              <!-- begin tab-content -->
              <div class="tab-content p-0">
                <!-- begin #profile-post tab -->
                @foreach ($articles as $article)
                <div class="tab-pane fade active show" id="profile-post">
                  <!-- begin timeline -->
                  <ul class="timeline">
                    <li>
                      <!-- begin timeline-time -->
                      <div class="timeline-time">
                        <span class="time">{{$article->created_at}}</span>
                      </div>
                      <!-- end timeline-time -->
                      <!-- begin timeline-icon -->
                      <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                      </div>
                      <!-- end timeline-icon -->
                      <!-- begin timeline-body -->
                      <div class="timeline-body">
                        <div class="timeline-header">
                          <span class="userimage"><img src="https://www.kindpng.com/picc/m/78-785827_user-profile-avatar-login-account-male-user-icon.png" alt="user"></span>
                          <span class="username">{{$article->user->fname}} {{$article->user->lname}}       <small></small></span>
                        </div>
                        <div class="timeline-content">
                        <h3 class="text">{{$article->title}}</h3>

                          <img  class="mb-3"src="{{ Storage::url($article->image) }}" height="350" width="835" alt="post" />
                          <p>
                          {{$article->body}}
                          </p>
                        </div>
                        <div class="timeline-likes">
                          
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container-fluid p-0">
        <div class="row text-left">
          <div class="col-md-5 col-sm-5">
            <h4 class="text-light">About us</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum maxime ea similique illum corrupti</p>
            <p class="pt-4 text-muted">Copyright ©2021 All rights reserved | This template is made with by
              <span> Aya Nait-Ïaz</span>
            </p>
          </div>
          <div class="col-md-5 col-sm-12">
            <h4 class="text-light">Newsletter</h4>
            <p class="text-muted">Stay Updated</p>
            <form class="form-inline">
              <div class="col pl-0">
                <div class="input-group pr-5">
                  <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2 col-sm-12">
            <h4 class="text-light">Follow Us</h4>
            <p class="text-muted">Let us be social</p>
            <div class="column text-light">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-youtube"></i>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./main.js"></script>
</body>




</html>