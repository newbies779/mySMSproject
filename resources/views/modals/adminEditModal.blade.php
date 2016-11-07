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
						<label for="Rentable"><strong>Category:&nbsp;</strong></label><br>
						<select class="form-control" name="category" id="category">
							@foreach ($categories as $category)
								<option value="{{ $category->id}}">{{ $category->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
                        <label for="status"><strong>Item status: </strong></label>					
                        <div aria-label="Status Button Group" class="btn-group" data-toggle="buttons" role="group">
                            <label class="btn btn-outline-info">
                                <input autocomplete="off" id="status1" name="status" type="radio" value="Available">
                                    <b>
                                        Available
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-warning">
                                <input autocomplete="off" id="status2" name="status" type="radio" value="Repairing">
                                    <b>
                                        Repairing
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-danger">
                                <input autocomplete="off" id="status3" name="status" type="radio" value="Broken">
                                    <b>
                                        Broken
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-lost">
                                <input autocomplete="off" id="status4" name="status" type="radio" value="Lost">
                                    <b>
                                        Lost
                                    </b>
                                </input>
                            </label>
                            <label class="btn btn-outline-default">
                                <input autocomplete="off" id="status5" name="status" type="radio" value="Unavailable">
                                    <b>
                                        Unavailable
                                    </b>
                                </input>
                            </label>
                        </div>
                    </div>

					<div class="form-group">
						<label for="itemid"><strong>Item ID: </strong></label>
						<input name="itemid" class="form-control" id="itemid" value="{{ old('itemid') }}" readonly>
					</div>

					<div class="form-group">

						<label for="itemname"><strong>Item name: <span class="tag"><?= requireTxt(); ?></span></strong></label>
						<input name="itemname" class="form-control" id="itemname" value="{{ old('itemname') }}" required>
					</div>
					
					<div class="form-group">
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<label for="reviewAssignee">
		                            <strong>
		                                Assignee:
		                            </strong>
		                        </label>
                                <div class="input-group">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Select
                                    </button>
                                    <div class="dropdown-menu">
                                    @foreach ($assignees as $assignee)
                                        <a class="assignee-drd dropdown-item" href="#" data-assignee="{{ $assignee }}"> {{ $assignee->name}} </a>
                                    @endforeach
                                    
                                    </div>
                                  </div>
                                   <input class="form-control" name="assignee" id="assignee" type="text" value="{{ old('assignee') }}" readonly>
                                   <input class="form-control" name="assignee_id" id="assignee_id" type="hidden" value="{{ old('assignee_id') }}">
                                </div>
                    		</div>
                    		<div class="col-sm-6">
                    			<label for="location">
		                            <strong>
		                                Location:<span class="tag"><?= requireTxt(); ?></span>
		                            </strong>
		                        </label>
		                        <input class="form-control" name="location" id="location" type="text" value="{{ old('location') }}" required>
                    		</div>
                    	</div>
                    </div>

					<div class="form-group">
						<strong><label for="note">Note:</label></strong>
						<textarea name="note" class="form-control" rows="4" id="note" value="{{ old('note') }}" required></textarea>
					</div>

					<div class="form-group">
						<label for="bought_year"><strong>bought year: </strong></label>
						<input type="date" name="bought_year" class="form-control" id="bought_year" value="{{ old('bought_year') }}"></input>
					</div>

					<input type="text" name="hiddenid" id="hiddenid" value="" style="display:none">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>