<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Dashboard</title>

<<<<<<< HEAD
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
=======
	{{-- <link href="{{ asset('/css/all.css') }}" rel="stylesheet"> --}}
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Material Design Bootstrap -->
    <link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet">
>>>>>>> c2d560c0bb1b582bd05c4d7c9e7f7dc0f3c861f4

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

	<script src="https://use.fontawesome.com/ac129b77f2.js"></script>

	

</head>
<body>
	<header>
<<<<<<< HEAD
		<section id="top-nav">
			<div class="container-fluid">
				<div class="row">
				<nav class="navbar navbar-full navbar-dark">
					<button class="col-xs-2 navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#topCollapsingNavbar">
				    &#9776;
				    </button>
				    <a class="col-xs-10 col-sm navbar-brand" href="#">Responsive navbar</a>
				    <div class="col-xs-12 col-sm collapse navbar-toggleable-xs" id="topCollapsingNavbar">
				        <ul class="nav navbar-nav">
				          <li class="nav-item">
				            <a class="nav-link" href="#">Not a member? <span class="sr-only">(register)</span></a>
				          </li>
				          <li class="nav-item">
				            <button type="button" class="btn btn-outline-primary">Sign Up</button>
				          </li>
				        </ul>
				    </div>
				</nav>
				</div>
			</div>
		</section>
	</header>
	<section class="login-form">
		<div class="container">
=======
	    <!--Navbar-->
	    <nav class="navbar navbar-dark bg-primary">
	        <!-- Collapse button-->
	        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
	            <i class="fa fa-bars"></i>
	        </button>
	        <div class="container">
	            <!--Collapse content-->
	            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
	                <!--Navbar Brand-->
	                <a class="navbar-brand" href="#">Navbar</a>
	                <!--Links-->
	                <ul class="nav navbar-nav">
	                    <li class="nav-item active">
	                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">Features</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">Pricing</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="#">About</a>
	                    </li>
	                </ul>
	                <!--Search form-->
	                <form class="form-inline">
	                    <input class="form-control" type="text" placeholder="Search">
	                </form>
	            </div>
	            <!--/.Collapse content-->
	        </div>
	    </nav>
	    <!--/.Navbar-->
	</header>
	<section class="login-form">
		{{-- <div class="container">
>>>>>>> c2d560c0bb1b582bd05c4d7c9e7f7dc0f3c861f4
			<div class="row">
				<div class="col-xs">
					<div class="logo">
						<h1>SMS</h1>
					</div>
					<div class="seperator"></div>
					<form>
						<div class="form-group row">
						  <div class="col-xs">
							<input class="form-control" type="email" id="email" value="" required/>
						    <label for="emailInput" class="col-xs-2 col-form-label">email</label>
						  </div>
						</div>
						<div class="form-group row">
						  <div class="col-xs">
							<input class="form-control" type="text" id="password" value="" required/>
						    <label for="password" class="col-xs-2 col-form-label">password</label>
						  </div>
						</div>
						<div class="form-group row">
							<div class="col-xs">
								<button type="submit" class="btn btn-block btn-secondary">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</row>
<<<<<<< HEAD
		</div>
	</section>

	{{-- jQuery --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
	<script src="{{ asset('/js/app.js') }}"></script>
=======
		</div> --}}
	</section>

	{{-- jQuery --}}
	{{-- <script src="{{ asset('/js/all.js') }}"></script> --}}
	<!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('/js/tether.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <!-- MDB core JavaScript -->    
	<script src="{{ asset('/js/mdb.js') }}"></script>
>>>>>>> c2d560c0bb1b582bd05c4d7c9e7f7dc0f3c861f4
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://js.pusher.com/3.2/pusher.min.js"></script>

	@yield('script')
	
</body>
</html>