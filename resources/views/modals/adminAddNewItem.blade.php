<div class="modal hide fade" id="adminAddNew" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="adminAddNew" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<div class="modal-header">
	                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
	                    <span aria-hidden="true" style="color: #fff;" data-dismiss="modal">
	                        ×
	                    </span>
	                </button>
	                <h5 class="modal-title">
	                    Add item
	                </h5>
	            </div>

			<form action="item" method="POST" id="formForAdminAddNew">
				{{ csrf_field() }}
				
				<div class="modal-body">
					<div class="form-group">
						<label for="itemid"><strong>Item ID: <span class="tag tag-warning" style="color: red;"></span></strong></label>
						<input name="itemid" class="form-control" id="itemid" value="{{ old('itemid') }}">
					</div>

					{{-- <div class="form-group">
						<label for="customid"><strong>Custom ID: </strong></label>
						<input name="customid" class="form-control" id="customid" value="{{ old('customid') }}">
					</div> --}}

					<div class="form-group">
						<label for="itemname"><strong>Item name: <span class="tag tag-warning" style="color: red;"><?= requireTxt(); ?></span></strong></label>
						<input name="itemname" class="form-control" id="itemname" required value="{{ old('itemname') }}">
					</div>


					{{-- <div class="form-group">
						<label for="status"><strong>Item status: </strong></label><br>
						<div aria-label="Status Button Group" class="btn-group" data-toggle="buttons" role="group">
                            <label class="btn btn-outline-info">
                                <input autocomplete="off" id="status1" name="options" type="radio" value="Available">
                                    <b>
                                        Available
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-warning">
                                <input autocomplete="off" id="status2" name="options" type="radio" value="Repairing">
                                    <b>
                                        Repairing
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-danger">
                                <input autocomplete="off" id="status3" name="options" type="radio" value="Broken">
                                    <b>
                                        Broken
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-lost">
                                <input autocomplete="off" id="status4" name="options" type="radio" value="Lost">
                                    <b>
                                        Lost
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-default">
                                <input autocomplete="off" id="status5" name="options" type="radio" value="Unavailable">
                                    <b>
                                        Unavailable
                                    </b>
                                </input>
                            </label>
                        </div>
					</div> --}}

					<div class="form-group">
						<label for="category"><strong>Item category: </strong></label><br>
						<select name="category" id="categorySelector">

							@foreach ($categories as $category)
							<option value="{{  $category->id }} "> {{ $category->name }} </option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="location"><strong>item location: <span class="tag tag-warning" style="color: red;"> <?= requireTxt(); ?> </span></strong></label>
						<input name="location" class="form-control" id="location" value="{{ old('location') }}" required>
					</div>

					<div class="form-group">
						<label for="note"><strong>note: </strong></label>
						<textarea name="note" class="form-control" rows="4" id="note" value="{{ old('note') }}"></textarea>
					</div>

					<div class="form-group">
						<label for="bought_year"><strong>bought year: </strong></label>
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