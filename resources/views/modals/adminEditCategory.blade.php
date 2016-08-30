<div class="modal hide fade" id="adminEditCategory" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminEditCategory" aria-hidden="true" >
	<div class="modal-dialog" role="document">
			<div class="modal-content ">
				<div class="modal-header">
	                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
	                    <span aria-hidden="true" style="color: #fff;">
	                        ×
	                    </span>
	                </button>
	                <h5 class="modal-title">
	                    Edit category
	                </h5>
	            </div>

				<form action="" method="POST" id="formForEditCategory">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}

					<div class="modal-body">
						
						<div class="form-group">
							<label for="name"><b>Category Name</b> <span class="tag tag-warning" style="color: red;"><?= requireTxt(); ?>:</span></label>
							<input name="name" class="form-control" id="name" value="{{ old('name') }}" required>
						</div>
		
						<div class="form-group">
							<label for="Rentable"><strong>Rentable:&nbsp;</strong></label><br>

							<select name="Rentable" id="Rentable">
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