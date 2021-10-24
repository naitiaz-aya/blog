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
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

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
                                <a class="nav-link" href="#">{{ __('Dashboard') }}</a>
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
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                             
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
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-7 col-sm-12  bck">
                        <h1>Sample is a place to write and read.</h1>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere accusamus eum dignissimos ipsa sequi expedita.
                        </p>
                        
                    </div>
                    <div class="col-md-5 col-sm-12  h-25">
                        <img src="https://www.exebenus.com/wp-content/uploads/revslider/the7-hero-scene-workspace/slider-ws-laptop.png" alt="Book" />
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="section-1">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="pray">
                                <img src="{{ asset('image/Tipos-de-post-de-blog.jpg') }}" alt="Pray" class="" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="panel text-left">
                                <h1>About us</h1>
                                <p class="pt-4">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere iure adipisci harum ducimus accusantium, repudiandae aperiam
                                    voluptatum, id ex ratione omnis reiciendis possimus officiis.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi vitae, tenetur quidem eum aliquid vel labore sint placeat
                                    ad deserunt consectetur fugit ullam. Eius unde neque ducimus obcaecati ipsum quos vero totam recusandae hic
                                    expedita nemo sit, illum harum. Quisquam impedit ullam itaque facere et ad molestiae quod reprehenderit excepturi!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-2 container-fluid p-0">
                <div class="cover">
                    <div class="overlay"></div>
                    <div class="content text-center">
                        <h1>Some Features That Made Us Unique</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, eum?
                        </p>
                    </div>
                </div>
                <div class="container-fluid text-center">
                    <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
                        <div class="rect">
                            <h1>2345</h1>
                            <p>Lorem ipsum</p>
                        </div>
                        <div class="rect">
                            <h1>6784</h1>
                            <p>Lorem ipsum</p>
                        </div>
                        <div class="rect">
                            <h1>1056</h1>
                            <p>Lorem ipsum</p>
                        </div>
                        <div class="rect">
                            <h1>9152</h1>
                            <p>Lorem ipsum</p>
                        </div>
                    </div>
                </div>


                
            </section>
            <section class="section-3 container-fluid p-0 text-center">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h1>Download Our App for all Platform</h1>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem alias perspiciatis omnis quod possimus odit
                            voluptatum! Sunt ea quasi praesentium, tenetur doloribus animi obcaecati, sint nemo quae laudantium iusto unde
                            eaque nostrum nobis voluptatum
                        </p>
                    </div>
                </div>
                <div class="platform row">
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="desktop shadow-lg">
                            <div class="d-flex flex-row justify-content-center">
                                <i class="fas fa-desktop fa-3x py-2 pr-3"></i>
                                <div class="text text-left">
                                    <h3 class="pt-1 m-0">Desktop</h3>
                                    <p class="p-0 m-0">On website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-left">
                        <div class="desktop shadow-lg">
                            <div class="d-flex flex-row justify-content-center">
                                <i class="fas fa-mobile-alt fa-3x py-2 pr-3"></i>
                                <div class="text text-left">
                                    <h3 class="pt-1 m-0">On Mobile</h3>
                                    <p class="p-0 m-0">On Play Store</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 4 -->
            <section class="section-4">
      <div class="container text-center">
        <h1 class="text-dark">What our Reader's Say about us</h1>
        <p class="text-secondary">Lorem ipsum dolor sit amet.</p>
      </div>
      <div class="team row ">
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="../assets/UI-face-3.jpg" class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title">Blalock Jolene</h3>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                    minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                  </p>
                  <a href="#" class="text-secondary text-decoration-none">Go somewhere</a>
                  <p class="text-black-50">CEO at Google</p>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner text-center">
                  <div class="carousel-item active">
                    <div class="card mr-2 d-inline-block shadow">
                      <div class="card-img-top">
                        <img src="../assets/UI-face-1.jpg" class="img-fluid rounded-circle w-50 p-4" alt="">
                      </div>
                      <div class="card-body">
                        <h3 class="card-title">Allen Agnes</h3>
                        <p class="card-text">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                          minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                        </p>
                        <a href="#" class="text-secondary text-decoration-none">Go somewhere</a>
                        <p class="text-black-50">CEO at Google</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card  d-inline-block mr-2 shadow">
                      <div class="card-img-top">
                        <img src="../assets/UI-face-2.jpg" class="img-fluid rounded-circle w-50 p-4" alt="">
                      </div>
                      <div class="card-body">
                        <h3 class="card-title">Amiel Barbara</h3>
                        <p class="card-text">
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                          minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                        </p>
                        <a href="#" class="text-secondary text-decoration-none">Go somewhere</a>
                        <p class="text-black-50">CEO at Google</p>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
        </div>
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="../assets/UI-face-4.jpg" class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title">Olivia Louis</h3>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint iure autem recusandae, veniam, illo dolor soluta assumenda
                    minima quia velit officia sit exercitationem nam ipsa, repellendus aut facilis quasi voluptas!
                  </p>
                  <a href="#" class="text-secondary text-decoration-none">Go somewhere</a>
                  <p class="text-black-50">CEO at Google</p>
                </div>
              </div>
        </div>
      </div>
    </section>
  </main>
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