<div class="modal hide fade" id="adminNewCate" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminNewCate" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<form action="category" method="POST" id="formForAdminEdit">
				{{ csrf_field() }}

				<div class="modal-header">
					<h><big>Create New Category</big></h>
					<button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>

				<div class="modal-body">

					<div class="form-group">
						<label for="name"><b>Category Name:&nbsp;<?= requireTxt(); ?></b></label>
						<input name="name" class="form-control" id="name" value="{{ old('name') }}" required>
					</div>

					<div class="form-group">
						<label for="Rentable"><strong>Rentable:&nbsp;</strong></label>
						<select class="form-control" name="Rentable" id="Rentable">
							<option value="1">yes</option>
							<option value="0">no</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-close btn-secondary hvr-box-shadow-outset" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary hvr-box-shadow-outset">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>