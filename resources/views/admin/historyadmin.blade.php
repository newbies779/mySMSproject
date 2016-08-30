@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div id="grid-lside" class="col-sm-2">  
 
</div>
<div id="grid-body" class="col-sm-8 offset-sm-2">
    <div id="table-container" class="card card-block shadow">
    	<h3 class="card-title text-xs-center">History</h3>
        <div id="header-button" class="pull-xs-right">
        </div>
        <div class="table-responsive">
            @include('admin.adminItemHistoryView', ['some' => 'data'])
        </div>
    </div>
</div>

@stop