<!DOCTYPE html>
<html lang="en">
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
<body class="fixed-sn @if($errors->regis->has(['email']) || $errors->regis->has(['name']) || $errors->regis->has(['password']))reveal-regis @endif">
	<header>
	@yield('header')
	</header>
	
	@yield('content')

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