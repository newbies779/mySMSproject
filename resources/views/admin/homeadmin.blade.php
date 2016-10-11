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
				<a class="nav-link nav-icon" href="#"><span class="fa fa-btn fa-lg fa-desktop"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-1" href="#">Home</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" href="#"><span class="fa fa-btn fa-lg fa-th-list"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-2" href="#">Collection</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" href="#"><span class="fa fa-btn fa-lg fa-star"></span>&nbsp;&nbsp;</a>
				<a class="nav-link side-nav nav-link-3" href="#">Review</a>
			</li>
			<li class="nav-item">
				
				<a class="nav-link nav-icon" href="#"><span class="fa fa-btn fa-lg fa-history"></span>&nbsp;&nbsp;</a>
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