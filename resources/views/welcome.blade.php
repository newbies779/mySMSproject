@extends('layouts.smslayout_new')

@section('header')
	@include('showerror')
	@include('flash')
	@include('layouts.nav-fix-top')
@stop

@section('content')
	<div class="pages">
		@include('auth.login')
		@include('auth.register')
		<section class="page page-overlay"></section>
		<a href="#" id="backtoLogin" class="animated pulse infinite">
			<div><small class="text-muted">Back to login</small></div>
			<i class="fa fa-arrow-down fa-2x prefix"></i>
		</a>
		<a class="btn btn-link" id="forgetLink" href="#"><small class="link-text">Forgot Your Password?</small></a>
		@include('auth.passwords.email')
		@include('alert.alert_fix_top', [
			'type' => 'info',
			'message' => '<strong>An email has been sent.</strong> Please check your inbox, Thank you.',
		])
	</div>
@stop
@include('showerror')

@section('script')
	<script>
		$('#homenav').hide();
	</script>
@stop
