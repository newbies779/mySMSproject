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
				<a class="nav-link" href="#"><i class="fa fa-btn fa-desktop"></i>&nbsp;&nbsp;Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link" href="#"><i class="fa fa-btn fa-th-list"></i>&nbsp;&nbsp;Collection</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link" href="#"><i class="fa fa-btn fa-star"></i>&nbsp;&nbsp;Review</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link" href="#"><i class="fa fa-btn fa-history"></i>&nbsp;&nbsp;History</a>
			</li>
		</ul>
		<ul id="bottomNav" class="nav navbar-nav">
			<li class="nav-item">
				<a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
			</li>
		</ul>
	</nav>
@stop

@section('ccontent')

<div id="grid-body" class="col-sm-10 offset-sm-1">
        <div id="table-container" class="card card-block shadow">
            <h3 class="card-title text-xs-center">Request List</h3>
            <div class="table-responsive">
                @include('admin.adminRentList')
            </div>
        </div>
    </div>
@stop