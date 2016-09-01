@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

<html lang="en">
<head>
	<title>Import - Export Laravel 5</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
	<nav class="navbar navbar-default" style="margin-top:150px">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Import - Export in Excel and CSV Laravel 5</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<a href="{{ URL::to('export') }}"><button class="btn btn-success">Download Excel xls</button></a>

		<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<h4>Import File</h4>
			<input type="file" name="import_file" />
			<br>
			<button class="btn btn-primary">Import File</button>
		</form>
	</div>
</body>
</html>