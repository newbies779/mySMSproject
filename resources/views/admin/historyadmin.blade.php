@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div id="grid-lside" class="col-sm-2">
	<h5>History</h5>
</div>
<div id="grid-body" class="col-sm-9">
    <div id="table-container" class="card card-block shadow">
        <div id="header-button" class="pull-xs-right">
        </div>
        <div class="table-responsive">
            @include('admin.adminItemHistoryView', ['some' => 'data'])
        </div>
    </div>
</div>

@stop