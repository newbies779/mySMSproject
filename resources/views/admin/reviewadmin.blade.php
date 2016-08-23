@extends('layouts.adminsmslayout')


@section('header')
	@include('showerror')
	@include('flash')
@stop

@section('content')
	<div class="modal fade" id="modalEditReview" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog">

	    <div class="modal-content">
	    	<div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	          <h4 class="modal-title" id="mySmallModalLabel">Review</h4>
	        </div>
	        <div class="modal-body">
	        	<form id="reviewForm" action="{{ url('/review/update') }}" method="POST">
	        		{{ csrf_field() }}
                    {{ method_field('PATCH') }}
			      	<fieldset class="form-group">
			      		<label for="formGroupExampleInput"><strong>Status:</strong> &nbsp;&nbsp;</label>
			      		<div class="btn-group" role="group" data-toggle="buttons" aria-label="Status Button Group">
						  <label class="btn btn-outline-info">
						  	<input type="radio" name="options" id="status1" autocomplete="off" value="Available"><b>Available</b>
						  </label>
						  <label class="btn btn-outline-success">
						  	<input type="radio" name="options" id="status2" autocomplete="off" value="Reserved"><b>Reserved</b>
						  </label>
						  <label class="btn btn-outline-primary">
						  	<input type="radio" name="options" id="status3" autocomplete="off" value="Borrowed"><b>Borrowed</b>
						  </label>
						  <label class="btn btn-outline-warning">
						 	 <input type="radio" name="options" id="status4" autocomplete="off" value="Repairing"><b>Repairing</b>
						 	 </label>
						  <label class="btn btn-outline-danger">
						  	<input type="radio" name="options" id="status5" autocomplete="off" value="Broken"><b>Broken</b>
						  </label>
						  <label class="btn btn-outline-default">
						  	<input type="radio" name="options" id="status6" autocomplete="off" value="Lost"><b>Lost</b>
						  </label>
						</div>
			      	</fieldset>
			      	<fieldset class="form-group">
			      		<label for="reviewNote"><strong>Item note:</strong></label>
			      		<textarea type="text" class="form-control" id="reviewNote" placeholder="Give me some note."></textarea>
			      	</fieldset>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				    	<button type="submit" class="btn btn-primary">Save changes</button>
				    </div>
			     </form>
	        </div>
	        
	    </div>
	  </div>
	</div>
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