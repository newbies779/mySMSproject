<div class="modal hide fade" id="adminAddNew" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminAddNew" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<form action="item" method="POST" id="formForAdminAddNew">
				{{ csrf_field() }}
				
				<div class="modal-body">
					<button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="form-group">
						<label for="itemid">Item ID <?= requireTxt(); ?>:</label>
						<input name="itemid" class="form-control" id="itemid" required value="{{ old('itemid') }}">
					</div>

					<div class="form-group">
						<label for="customid">Custom ID:</label>
						<input name="customid" class="form-control" id="customid" value="{{ old('customid') }}">
					</div>

					<div class="form-group">
						<label for="itemname">Item name <?= requireTxt(); ?>:</label>
						<input name="itemname" class="form-control" id="itemname" required value="{{ old('itemname') }}">
					</div>


					<div class="form-group">
						<label for="status">Item status:</label>
						<select name="status" id="statusSelector">
							<option>Available</option>
							<option>Broken</option>
							<option>Borrowed</option>
							<option>Lost</option>
							<option>Repairing</option>
							<option>Reserved</option>
							<option>ReturnPending</option>
						</select>
					</div>

					<div class="form-group">
						<label for="category">Item category:</label>
						<select name="category" id="categorySelector">
							@foreach ($categories as $key => $value)
							<option value="<?= $key ?>"><?= $value ?></option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="location">item location <?= requireTxt(); ?>:</label>
						<input name="location" class="form-control" id="location" value="{{ old('location') }}" required>
					</div>

					<div class="form-group">
						<label for="note">note:</label>
						<textarea name="note" class="form-control" rows="4" id="note" value="{{ old('note') }}"></textarea>
					</div>

					<div class="form-group">
						<label for="bought_year">bought year:</label>
						<input type="date" name="bought_year" class="form-control" id="bought_year" value="{{ old('bought_year') }}"></input>
					</div>

				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-close btn-secondary hvr-box-shadow-outset" data-dismiss="modal" style="margin-right:10px">Close</button>
					<button type="submit" class="btn btn-primary hvr-box-shadow-outset">Confirm</button>
				</div>

			</form>
		</div>
	</div>
</div>