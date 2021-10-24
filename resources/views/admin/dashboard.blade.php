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
	<link href="{{ asset('css/footer.css') }}" rel="stylesheet">
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
			<div class="username">
				<a href="/adminprofile" class="nav-link  second-text ms-auto fw-bold" id="navbar" d aria-expanded="false">
					<h3> <i class='bx bx-face'></i>Hi, {{ Auth::user()->fname }}</h3>
				</a>
				<div class="avatar">
					<img src="https://resolution-conflits.protegez-vous.ca/wp-content/uploads/2020/05/testimony.png" alt="Avatar" />
				</div>
			</div>

			<div class="reservation">
				<table>
					<tr class="headtable">
						<th>Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Country</th>
						<th>Gender</th>
						<th>Job</th>
						
					</tr>
					@foreach ($users as $user)
					@if( $user->id !== 5)
					<tr class="rtable">
						<td>#{{$user->id}}</td>
						<td>{{$user->fname}}</td>
						<td>{{$user->lname}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role}}</td>
						<td>{{$user->country}}</td>
						<td>{{$user->gender}}</td>
						<td>{{$user->job}}</td>
						

					</tr>
					@endif
					@endforeach
				</table>
			</div>
		</section>


		</main>
	</div>
	
	<!-- jQuery library -->
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