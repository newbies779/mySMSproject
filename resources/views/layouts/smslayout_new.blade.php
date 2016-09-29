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
<body class="fixed-sn blue-skin @if($errors->has(['regis_email']) || $errors->has(['regis_name']) || $errors->has(['regis_password']))reveal-regis @endif">
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
		                    <a class="btn btn-default-outline" id="signUp" style="padding: 10px 30px">Sign Up</a>
		                </li>
		            </ul>
		        </div>
		        <!--/.Collapse content-->
		    </div>
		</nav>
	    <!--/.Navbar-->
	</header>
	<div class="pages">
		<section class="page login-form page--current">
			<div class="logo">
				<h1>SMS</h1>
			</div>
			<form>
			<div class="container">
				<div class="row">
					<!--Email validation-->
					<div class="md-form col-xs">
					    <i class="fa fa-envelope prefix"></i>
					    <input type="email" id="email" class="form-control validate">
					    <label for="email" data-error="wrong" data-success="right">Type your email</label>
					    @if ($errors->has('email'))
	                        <span class="help-block text-warning">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
					</div>
					<!--Password validation-->
					<div class="md-form col-xs">
					    <i class="fa fa-lock prefix"></i>
					    <input type="password" id="password" class="form-control validate">
					    <label for="password" data-error="wrong" data-success="right">Type your password</label>
					    @if ($errors->has('password'))
                            <span class="help-block text-warning">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>
					<label class="custom-control custom-checkbox col-xs pull-xs-right">
					  <input type="checkbox" name="remember" class="custom-control-input">
					  <span class="custom-control-indicator"></span>
					  <span class="custom-control-description">remember me</span>
					</label>
					<div class="md-form form-group col-xs">
				        <a href="#" class="btn btn-default btn-lg btn-block" id="login">Login</a>
				    </div>
				</div>
			</div>
			</form>
		</section>
		<section class="page regis-form">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
			{{ csrf_field() }}
				<div class="container">
					<div class="row">
						<div class="col-xs regis-title">
							<h1>SIGN UP</h1>
						</div>
					</div>
					<!--First row-->
				    <div class="row">
				        <!--First column-->
				        <div class="col-md-12">
							<div class="md-form">
								<i class="fa fa-user prefix"></i>
				            	<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
				            	@if ($errors->has('name'))
									<span class="help-block text-warning">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
								@endif
				                <label for="name">What's your name?</label>
				            </div>
				        </div>
				        <!--Second column-->
				        <div class="col-md-12">
				            <div class="md-form">
				                <i class="fa fa-envelope prefix"></i>
				                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
				                @if ($errors->has('email'))
                                   	<span class="help-block text-warning">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								<label for="email" data-error="wrong" data-success="right">Type your email</label>
				            </div>
				        </div>
				    </div>
				    <!--/.First row-->

					<!--Second row-->
				    <div class="row">
						<!--First column-->
				        <div class="col-md-6">
				            <div class="md-form">
				                <i class="fa fa-lock prefix"></i>
				                <input id="password" type="password" class="form-control" name="password">
				                @if ($errors->has('password'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
				                <label for="password" data-error="wrong" data-success="right">Type your password</label>
				            </div>
				        </div>
				        <!--Second column-->
				        <div class="col-md-6">
				            <div class="md-form">
				                <i class="fa fa-lock prefix"></i>
				                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-warning">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
				                <label for="password_confirmation" data-error="wrong" data-success="right">Confirm your password</label>
				            </div>
				        </div>
				    </div>
				    <!--/.Second row-->

				    <!--Third row-->
				    <div class="row">
				        <!--First column-->
				        <div class="md-form form-group col-md-12">
					        <button type="submit" class="btn btn-default btn-lg btn-block">Login</button>
					    </div>
				    </div>
					    
				</div>
			</form>
		</section>
		<section class="page page-overlay">
			
		</section>
		<a href="#" id="backtoLogin" class="animated pulse infinite">
			<div><small class="text-muted">Back to login</small></div>
			<i class="fa fa-arrow-down fa-2x prefix"></i>
		</a>
		<a class="btn btn-link" id="forgetPassword" href="#"><small>Forgot Your Password?</small></a>
	</div>
	<!--Card-->
	<div class="card forget-card">

	    <!--Card content-->
	    <div class="card-block">
	    	<div class="container">
	    		<div class="row">
					<div class="col-xs-6">
		    			<h4 class="card-title">Reset password</h4>
		    			<p class="card-text">Can't remember your password, right?<br> It's ok. We will send an email back to you.</p>
		    		</div>
		    		<div class="col-xs-6">
		    			<form class="form-inline" role="form" method="POST" action="{{ url('/password/reset') }}">
				        	<div class="md-form form-group">
						        <i class="fa fa-envelope prefix"></i>
						        <input type="email" id="form91" class="form-control">
						        <label for="form91" data-error="wrong" data-success="right">Type your email</label>
						    </div>
						    <div class="md-form form-group">
						        <a href="#" class="btn btn-primary">Send</a>
						    </div>
				        </form>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	    <!--/.Card content-->

	</div>

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

	{{-- Custom --}}
	<script src="{{ asset('/js/app.js') }}"></script>

	@yield('script')
	
</body>
</html>