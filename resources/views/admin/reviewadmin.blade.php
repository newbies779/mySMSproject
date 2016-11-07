@extends('layouts.smslayout')


@section('header')
	@include('showerror')
	@include('flash')
@stop

@section('tableContent')
<div class="container-fluid" id="tableContent">
	<div class="col-sm-10 offset-sm-1">
		<div id="tableadmin-container" class="card card-block shadow">
			<div>
				@include('admin.adminReviewList')
			</div>
		</div>
	</div>
</div>
@stop
{{-- Include Modal --}}
@include('modals.showModalReview')