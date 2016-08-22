@extends('layouts.smslayout')

@section('header')
	@include('showerror')
	@include('flash')
@stop

@section('content')

<div class="card card-default" style="margin-top:25px;">
    <div class="card-header">Welcome</div>

    <div class="card-block">
        Your Application's Landing Page.
    </div>
</div>

@include('showerror')

@endsection
