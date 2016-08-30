<div class="modal hide fade" id="adminEditItem" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminEdit" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true" style="color: #fff;">
                        ×
                    </span>
                </button>
                <h5 class="modal-title" id="mySmallModalLabel">
                    Edit item
                </h5>
            </div>

			<form action="" method="POST" id="formForAdminEdit">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

				<div class="modal-body">
					<div class="form-group">
						<label for="itemid"><strong>Item ID: </strong></label>
						<input name="itemid" class="form-control" id="itemid" value="{{ old('itemid') }}" readonly>
					</div>

					<div class="form-group">

						<label for="itemname"><strong>Item name: <span class="tag tag-warning" style="color: red;"><?= requireTxt(); ?></span></strong></label>
						<input name="itemname" class="form-control" id="itemname" value="{{ old('itemname') }}" required>
					</div>

					<div class="form-group">
						<label for="status"><strong>Item status: </strong></label>					
						<span id='spanStatus' class="tag"></span>
						<input name="status" id="inputStatus" style="display:none">
					</div>

					<div class="form-group">
						<label for="location"><strong>Item location: <span class="tag tag-warning" style="color: red;"><?= requireTxt(); ?></span></strong></label>
						<input name="location" class="form-control" id="location" value="{{ old('location') }}" required>
					</div>

					{{-- <div class="form-group">
						<label for="note">note:</label>
						<textarea name="note" class="form-control" rows="4" id="note" value="{{ old('note') }}"></textarea>
					</div> --}}

					<div class="form-group">
						<label for="bought_year"><strong>bought year: </strong></label>
						<input type="date" name="bought_year" class="form-control" id="bought_year" value="{{ old('bought_year') }}"></input>
					</div>

					<div class="form-group">
						<label for="Rentable"><strong>Category:&nbsp;</strong></label><br>
						<select name="category" id="category">
							@foreach ($categories as $category)
								<option value="{{ $category->id}}">{{ $category->name}}</option>
							@endforeach
						</select>
					</div>

					<input type="text" name="hiddenid" id="hiddenid" value="" style="display:none">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-close btn-secondary hvr-box-shadow-outset" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary hvr-box-shadow-outset">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>