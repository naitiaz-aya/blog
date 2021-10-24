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
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
	<link href="{{ asset('css/subscription.css') }}" rel="stylesheet">
	<!-- <link href="{{ asset('css/create.css') }}" rel="stylesheet"> -->

</head>

<body>
	<div id="app">
	<aside class="sidebar">
			<div class="logo">

				<a href="/home">
					<h1><i class="fas fa-book-reader" color="#3E64FF"></i>  Sample</h1>
				</a>

			</div>
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
			<div class="side-menu">
			<div class="nav-item m-4">

				<a href="/dashboard">
				<h2><i class="fas fa-home" color="#3E64FF"></i>
					Dashboard</h2>
				</a>
			</div>
				<div class="nav-item m-4">

					<a href="/Subscriptions">
					<h2><i class="fas fa-dollar-sign" color="#3E64FF"></i>
						Subscription</h2>
					</a>
				</div>
			
				<div class="nav-item m-4" onclick="event.preventDefault();
																										 document.getElementById('logout-form').submit();">
					
						<a href="{{ route('logout') }}">
						<h2><i class="fas fa-sign-out-alt"  color="#3E64FF"></i> {{ __('Logout') }}</h2>
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					
				</div>
		

			</div>
		</aside>
		<section class="container">
			<div class="col-md-3">
			<a href="/CreateSubscription"><button class="btn">
            Add Subscription
          </button></a>
			</div>
			<!-- <div class="username">
				<a href="" class="nav-link  second-text ms-auto fw-bold" id="navbar" d aria-expanded="false">
					<h3> <i class='bx bx-face'></i>Hi, {{ Auth::user()->name }}</h3>
				</a>
				<div class="avatar">
					<img src="https://resolution-conflits.protegez-vous.ca/wp-content/uploads/2020/05/testimony.png" alt="Avatar" />
				</div> -->
				<div class="reservation">
					@foreach($subscriptions as $subscription)
					
				<div class="container mt-5">
    <div class="col d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="d-flex justify-content-center px-2">
                    <div class="d-flex flex-row mt-5">
                        <h1 class="mt-0 off">{{$subscription->type}}</h1> 
                    </div>
                </div>
                <div class="line">
                    <hr>
                </div>
                <div class="text-center mb-5"> <span class="text-uppercase">{{$subscription->price}}$</span> </div>
            </div>
        </div>
    </div>
	</div>
	@endforeach
</div>
			</div>
			
		</section>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script>
		function navSlide() {
			const burger = document.querySelector(".burger");
			const nav = document.querySelector(".side-menu");
			const aside = document.querySelector("aside");
			burger.addEventListener("click", () => {
				//Toggle Nav
				nav.classList.toggle("side-active");
				aside.classList.toggle("aside-active");
				//Burger Animation
				burger.classList.toggle("toggle");
			});
		}
		navSlide();
	</script>
</body>
</html>