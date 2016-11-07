@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')
@stop

@section('tableContent')
<div class="container" id="tableContent">
	<div id="grid-body row">
        <div class="card card-table col-xs-12 shadow">
          <div class="row">
           <div class="card-header bg-primary col-xs-12">
            <h2 class="card-title">Feed</h2>
            <ul class="nav nav-tabs card-header-tabs float-xs-left" role="tablist">
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rent" role="tab">Rent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#return" role="tab">Return</a>
            </li>
        </ul>
    </div>
</div>

<div class="row card-block">
{{-- {{ dd($tab) }} --}}
<div class="tab-content" data-current="">
        @include('admin.adminTable')
        {{-- @include('admin.adminRentList') --}}
    </div>
</div>
</div>
</div>
</div>
@stop
