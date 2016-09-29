<!DOCTYPE html>
<html lang="">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Dashboard</title>

	{{-- <link href="{{ asset('/css/all.css') }}" rel="stylesheet"> --}}
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Material Design Bootstrap -->
    <link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

	<script src="https://use.fontawesome.com/ac129b77f2.js"></script>

	

</head>
<body>
	<header>
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

	</section>

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