@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div class="container-fluid" id="tableContent">
	<div id="grid-body" class="col-sm-8 offset-sm-2">
	    <div id="table-container" class="card card-block shadow">
	        <div id="header-button" class="pull-xs-right">
	        </div>
	            @include('admin.adminItemHistoryView', ['some' => 'data'])
	    </div>
	</div>
</div>
@stop