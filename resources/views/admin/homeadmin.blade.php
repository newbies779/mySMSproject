@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')
@stop

@section('tableContent')

<div id="grid-body" class="col-sm-10 offset-sm-1">
        <div id="table-container" class="card card-block shadow">
            <h3 class="card-title text-xs-center">Request List</h3>
            <div class="table-responsive">
                @include('admin.adminRentList')
            </div>
        </div>
    </div>
@stop