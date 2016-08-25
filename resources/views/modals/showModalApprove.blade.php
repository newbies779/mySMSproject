{{-- Modal Rent Approve --}}
<div class="modal fade" id="rentApproveModal" tabindex="-1" role="dialog" aria-labelledby="rentModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="#rentModalLabel">Are you sure to approve this request?</h4>
			</div>
			<div class="modal-body">
				<p class="lead"> Here's the deatails of wanted rent item</p>
				<form>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-CustomId:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="icustomId"></p>
				    </div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-Name:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="iname"></p>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-Status:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="istatus"></p>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Rent-Note:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="inote"></p>
				    </div>
				</div>


				</form>
			</div>
			<div class="modal-footer">
				<!-- Button Rent Approve -->
				<form action="" method="POST" id="formRentApprove">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<td class="text-xs-right">
						<div class="form-group">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
						<button type="submit" class="btn btn-primary">Approve</button>
					</div>
					</td>

				</form>
			</div>
		</div>
	</div>
</div>

{{-- Modal Return Approve --}}
<div class="modal fade" id="returnApproveModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="#returnModalLabel">Are you sure to approve this request?</h4>
			</div>
			<div class="modal-body">
				<p class="lead"> Here's the deatails of wanted rent item</p>
				<form>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-CustomId:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="rcustomId"></p>
				    </div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-Name:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="rname"></p>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Item-Status:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="rstatus"></p>
				    </div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Return-Note:</label>
				    <div class="col-sm-7">
				      <p class="modal-inform form-control-static" id="rnote"></p>
				    </div>
				</div>


				</form>
			</div>
			<div class="modal-footer">
				<!-- Button Rent Approve -->
				<form action="" method="POST" id="formReturnApprove">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<td class="text-xs-right">
						<div class="form-group">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
						<button type="submit" class="btn btn-primary">Approve</button>
					</div>
					</td>

				</form>
			</div>
		</div>
	</div>
</div>