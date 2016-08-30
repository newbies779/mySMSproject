@extends('layouts.smslayout')


@section('header')
	@include('showerror')
	@include('flash')
@stop

@section('tableContent')

	<div class="col-sm-10 offset-sm-1">
		<div id="tableadmin-container" class="card card-block shadow">
			<h3 class="card-title text-xs-center">Review List</h3>
			<div class="table-responsive">
				@include('admin.adminReviewList')
			</div>
		</div>
	</div>
	
@stop
{{-- Include Modal --}}
@include('modals.showModalReview')