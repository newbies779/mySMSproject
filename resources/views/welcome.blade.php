@extends('layouts.smslayout')

@section('header')
	@include('showerror')
	@include('flash')
@stop

@section('content')

    <div id="hero-section">
    	<div class="jumbotron jumbotron-fluid">
    	<h1 class="display-3">Welcome to SMS project</h1>
		<p class="lead">
			Have not create account yet? 
		</p>
        <div class="btn-group" role="group" aria-label="Button Hero">
          <a href="{{ url('/register') }}" role="button" class="btn btn-primary"><strong>Join Us</strong></a>
        </div>
    	</div>
    </div>

@include('showerror')

@section('script')
	<script>
		$('#homenav').hide();
	</script>
@stop
@endsection
