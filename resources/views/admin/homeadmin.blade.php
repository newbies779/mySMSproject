@extends('layouts.app')
@section('header')
@include('showerror')
@include('flash')
{{-- App side bar --}}
	<nav id="app-sidebar" class="navbar navbar-light bg-faded">
		<button class="navbar-toggler" type="button">
            &#9776;
        </button>
		{{-- <a class="navbar-brand hidden-md-down" href="#">MENU</a> --}}
		<ul id="topNav" class="nav navbar-nav">
			<li class="nav-item">
				<a class="dropdown-item" href="#"><span class="name">{{ substr(Auth::user()->name, 0, 1) }}</span></a>{{-- &nbsp;<span class="text-muted"><small>{{ Auth::user()->role }}</small></span> <span class="caret"></span> --}}
			</li>
		</ul>
		

		<ul id="centralNav" class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link nav-icon" id="navIcon1" href="#"><span class="fa fa-btn fa-lg fa-desktop"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-1" href="#">Home</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" id="navIcon2" href="#"><span class="fa fa-btn fa-lg fa-th-list"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-2" href="#">Collection</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" id="navIcon3" href="#"><span class="fa fa-btn fa-lg fa-star"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-3" href="#">Review</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" id="navIcon4" href="#"><span class="fa fa-btn fa-lg fa-history"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-4" href="#">History</a>
			</li>
		</ul>
		<ul id="bottomNav" class="nav navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/logout') }}"><span class="fa fa-btn fa-lg fa-sign-out"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-out" href="#">Logout</a>
			</li>
		</ul>
	</nav>
@stop

@section('content')
<div id="grid-body" class="col-xs-10 offset-xs-2 card">
	<div class="row top-panel-row">
		<div id="topPanel" class="card col-xs-2">
		    <div class="card-block">
		        <h3 class="card-title">INBOX REQUEST</h3>
		    </div>
		</div>
		<div id="searchPanel" class="card col-xs-10">
			<div class="card-block">
				<div class="md-form">
					<i class="fa fa-search fa-2x prefix"></i>
		    		<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-admin" id="tableAdminSearch">
				</div>
		    </div>
		</div>
	</div>
	<div class="row" id="panel-tab-btn">
    		<ul class="list-group col-xs-2">
			  <li class="list-group-item active">Rent Request</li>
			  <li class="list-group-item">Return Request</li>
			</ul>
    	<div class="card-block col-xs-10">
		        <div class="table-responsive">
		            @include('admin.adminRentList')
		        </div>
    	</div>
    </div>
{{-- <div id="grid-body2" class="col-xs-6">
    <div id="table-container" class="card card-block shadow">
        <h3 class="card-title text-xs-center">Request List</h3>
        <div class="table-responsive">
            @include('admin.adminRentList')
        </div>
    </div>
</div> --}}
@stop

@section('script')
	<script>
		// (function() {
		// 	var lineMaker = new LineMaker({
		// 			position: 'fixed',
		// 			lines: [
		// 				{top: 0, left: '10%', width: 13, height: '100vh', color: '#5ccc93', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 400, direction: 'TopBottom' }},
		// 				{top: 0, left: '30%', width: 16, height: '100vh', color: '#5ccc93', hidden: true, animation: { duration: 1000, easing: 'easeInOutQuad', delay: 100, direction: 'TopBottom' }},
		// 				{top: 0, left: '50%', width: 9, height: '100vh', color: '#5ccc93', hidden: true, animation: { duration: 1000, easing: 'easeInOutQuad', delay: 0, direction: 'TopBottom' }},
		// 				{top: 0, left: '70%', width: 30, height: '100vh', color: '#5ccc93', hidden: true, animation: { duration: 1000, easing: 'easeOutSine', delay: 400, direction: 'TopBottom' }},
		// 				{top: 0, left: '90%', width: 17, height: '100vh', color: '#5ccc93', hidden: true, animation: { duration: 1000, easing: 'easeOutSine', delay: 300, direction: 'TopBottom' }}
		// 			]
		// 	});
			
		// 	setTimeout(function() {
		// 		lineMaker.animateLinesIn(function (){
		// 			setTimeout(function() {
		// 				lineMaker.animateLinesOut();
		// 			}, 250);
		// 		});
		// 	}, 250);
		// })();
	</script>
@stop