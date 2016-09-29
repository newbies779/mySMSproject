<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Dashboard</title>

	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Material Design Bootstrap -->
    <link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<script src="https://use.fontawesome.com/ac129b77f2.js"></script>

	

</head>
<body class="fixed-sn blue-skin">
	<header>
	    <!--Navbar-->
		<nav class="navbar navbar-full navbar-fixed-top navbar-dark bg-transparent">

		    <!-- Collapse button-->
		    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
		        <i class="fa fa-bars"></i>
		    </button>

		    <div class="container-fluid">
		        <!--Collapse content-->
		        <div class="collapse navbar-toggleable-xs" id="collapseEx2">
		            <!--Navbar Brand-->
		            <a class="navbar-brand">Welcome to SMS</a>
		            <!--Links-->
		            <ul class="nav navbar-nav pull-right">
		                <li class="nav-item">
		                    <a class="nav-link">Not a member? <span class="sr-only">(current)</span></a>
		                </li>
		                <li class="nav-item">
		                    <a class="btn btn-default-outline" style="padding: 10px 30px">Sign Up</a>
		                </li>
		            </ul>
		        </div>
		        <!--/.Collapse content-->

		    </div>

		</nav>
<!--/.Navbar-->
	    <!--/.Navbar-->
	</header>
	<section class="login-form">
			<div class="logo">
				<h1>SMS</h1>
			</div>
			<form>
			<div class="container">
				<div class="row">
					<!--Email validation-->
					<div class="md-form col-xs">
					    <i class="fa fa-envelope prefix"></i>
					    <input type="email" id="form9" class="form-control validate">
					    <label for="form9" data-error="wrong" data-success="right">Type your email</label>
					</div>
					<!--Password validation-->
					<div class="md-form col-xs">
					    <i class="fa fa-lock prefix"></i>
					    <input type="password" id="form10" class="form-control validate">
					    <label for="form10" data-error="wrong" data-success="right">Type your password</label>
					</div>
					 <div class="md-form form-group col-xs">
				        <a href="" class="btn btn-default btn-lg btn-block">Login</a>
				    </div>
				</div>
			</div>
			</form>
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
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://js.pusher.com/3.2/pusher.min.js"></script>

	@yield('script')
	
</body>
</html>