@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div id="grid-lside" class="col-sm-2">
	<div class="content">
		<ul class="list-group">
		<a href="#">
			<li class="list-group-item">Item History</li>
		</a>
	  	<a href="#">
			<li class="list-group-item">User History</li>
		</a>
	</ul>
	</div>	
</div>
<div id="grid-body" class="col-sm-8 offset-sm-2">
    <div id="table-container" class="card card-block shadow">
        <div id="header-button" class="pull-xs-right">
        </div>
        <div class="table-responsive">
            @include('admin.adminItemHistoryView', ['some' => 'data'])
        </div>
    </div>
</div>

@stop