<div class="modal hide fade" id="adminImportItem" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminImportItem" aria-hidden="true" >
	<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content ">
				<div class="modal-header">
	                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
	                    <span aria-hidden="true" style="color: #fff;">
	                        ×
	                    </span>
	                </button>
	                <h5 class="modal-title">
	                    Import item
	                </h5>
	            </div>

				<form style="margin-top: 15px;padding: 10px;" action="{{ URL::to('import') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="input-group">
					  <input type="file" class="form-control" name="import_file" placeholder="Select file to import" aria-describedby="import-addon">
					</div>
					<br>
					<button class="btn btn-primary">Import File</button>
				</form>
			</div>
		</div>
</div>