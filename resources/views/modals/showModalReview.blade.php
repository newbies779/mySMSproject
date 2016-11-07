<div aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal fade" id="modalEditReview" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true" style="color: #fff;">
                        ×
                    </span>
                </button>
                <h5 class="modal-title" id="mySmallModalLabel">
                    Review
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ url('/review/update') }}" id="reviewForm" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <fieldset class="form-group">
                        <label for="formGroupExampleInput">
                            <strong>
                                Status: &nbsp;&nbsp;&nbsp;&nbsp;
                            </strong>
                        </label>
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
                    </fieldset>

                    <fieldset class="form-group">
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
                                  <input id="reviewAssignee" type="text" class="form-control" aria-label="Text input with dropdown button" disabled >
                                </div>
                    		</div>
                    		<div class="col-sm-6">
                    			<label for="reviewLocation">
		                            <strong>
		                                Location:
		                            </strong>
		                        </label>
		                        <input class="form-control" id="reviewLocation" placeholder="Assignee address (Ex. CB4 ชั้น8)" type="text">
                    		</div>
                    	</div>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="reviewNote">
                            <strong>
                                Item note:
                            </strong>
                        </label>
                        <textarea class="form-control" cols="50" id="reviewNote" placeholder="Type your note" rows="4" type="text">
                        </textarea>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Close
                </button>
                <button class="btn btn-primary" type="submit">
                    Save changes
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
