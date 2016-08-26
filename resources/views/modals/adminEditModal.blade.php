<div class="modal hide fade" id="adminEditItem" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminEdit" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<form action="" method="POST" id="formForAdminEdit">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

				<div class="modal-header">
					<button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="form-group">
						<label for="itemid">Item ID:</label>
						<input name="itemid" class="form-control" id="itemid" disabled>{{ old('itemid') }}</input>
					</div>

					<div class="form-group">
						<label for="itemname">Item name <?= requireTxt(); ?>:</label>
						<input name="itemname" class="form-control" id="itemname" required>{{ old('itemname') }}</input>
					</div>

				</div>

				<div class="modal-body">

					<div class="form-group">
						<label for="status">Item status:</label>					
						<span id='spanStatus' class="tag"></span>
					</div>

					<div class="form-group">
						<label for="location">item location <?= requireTxt(); ?>:</label>
						<input name="location" class="form-control" id="location" value="{{ old('location') }}" required>
					</div>

					{{-- <div class="form-group">
						<label for="note">note:</label>
						<textarea name="note" class="form-control" rows="4" id="note" value="{{ old('note') }}"></textarea>
					</div> --}}

					<div class="form-group">
						<label for="bought_year">bought year:</label>
						<input type="date" name="bought_year" class="form-control" id="bought_year" value="{{ old('bought_year') }}"></input>
					</div>

					<input type="text" name="hiddenid" id="hiddenid" value="" style="display:none">

					<div class="form-group pull-xs-right">
						<button type="button" class="btn btn-close btn-secondary hvr-box-shadow-outset" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary hvr-box-shadow-outset">Confirm</button>
					</div>


				</div>
				<div class="modal-footer">

				</div>
			</form>
		</div>
	</div>
</div>