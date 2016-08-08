<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SMS Website</title>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

	

</head>
<body>
	<header id="layout-header">
		<nav id="nav-header" class="navbar navbar-full navbar-light bg-faded shadow">
			<div class="container">
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
					&#9776;
				</button>
				<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
					<div class="bg-faded p-a-1">
						<a class="navbar-brand" href="{{ url('/') }}">Responsive navbar</a>
					<ul class="nav navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Features</a>
						</li>

						@if (Auth::guest())
						
						<li class="nav-item pull-xs-right"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>

						<li class="nav-item pull-xs-right"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
						@else
						<div class="dropdown pull-xs-right">
							<a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-target="#" aria-haspopup="true" aria-expanded="false" id="dropdownMenuLink">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
							</div>
						</div>
						@endif
					</ul>
					</div>
				</div>
			</div>
		</nav>

		<div id="header-body" class="container" style="margin-top: 10px">
		@yield('header')
		</div>

	</header><!-- /header -->
	
	
	
	<div class="container">
		@yield('content')
	</div>

	<div class="container" id="tableContent">
		@yield('tableContent')
	</div>

	{{-- jQuery --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>
	
	@yield('script')
	
</body>
</html>