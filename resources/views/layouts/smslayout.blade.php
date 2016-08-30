<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>SMS Website</title>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

	<script src="https://use.fontawesome.com/ac129b77f2.js"></script>

	

</head>
<body>
	<header id="layout-header">
		<nav id="nav-header" class="navbar navbar-fixed-top navbar-full navbar-light bg-faded nav-shadow">
			<div class="container">
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
					&#9776;
				</button>
				<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
					<div class="bg-faded p-a-1">
						<a class="navbar-brand" href="{{ url('/') }}">SMS project</a>
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<a class="nav-link" id="homenav" href="{{ url('/home') }}">Home</a>
							</li>
							@if (!Auth::guest())
								@if (Auth::user()->role == "Admin")
									<li class="nav-item">
										<a class="nav-link" id="editnav" href="{{ url('/item') }}">Edit</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="reviewnav" href="{{ url('/review') }}">Review</a>
									</li>

									<li class="nav-item" style="margin-right: 16px;">
										<a class="nav-link" id="historynav" href="{{ url('/history') }}">History</a>
									</li>
								@endif
							@endif

							<!--Right Side of NavBar -->
							@if (Auth::guest())

							<li class="nav-item pull-xs-right" style="margin-right: 16px;"><a class="nav-link" id="regisnav" href="{{ url('/register') }}">Register</a></li>

							<li class="nav-item pull-xs-right"><a class="nav-link" id="loginnav" href="{{ url('/login') }}">Login</a></li>
							@else
							<div class="dropdown pull-xs-right">
								<a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-target="#" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">
									{{ Auth::user()->name }}&nbsp;<span class="text-muted"><small>{{ Auth::user()->role }}</small></span> <span class="caret"></span>
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-right: 20px;">
									<a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
								</div>
							</div>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<div id="header-body" class="container" style="margin-top: 100px;padding-right:30px">
			@yield('header')
			
		</div>

	</header><!-- /header -->
	
	
	
	<div class="container-fluid" id="content">
		@yield('content')
	</div>

	<div class="container-fluid" id="tableContent">
		@yield('tableContent')
	</div>

	{{-- jQuery --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
	<link href="{{ asset('/js/app.js') }}">

	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://js.pusher.com/3.2/pusher.min.js"></script>

	@yield('script')
	
</body>
</html>