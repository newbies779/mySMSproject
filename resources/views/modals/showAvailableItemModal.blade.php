<!-- Modal1 -->
<div class="modal hide fade" id="rentListModal" data-focus-on="input:first" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-lg">
			<div class="modal-header">
				<button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Available Item List</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-hover tata" style="width: 100%;" cellspacing="0" id="itemtable1">
						<thead class="thead-default">
							<tr>
								<th class="text-xs-left">#</th>
								<th class="text-xs-left">Custom Id</th>
								<th class="text-xs-left">Item Name</th>
								<th class="text-xs-left">Location</th>
								<th class="text-xs-left">Category</th>
								<th style="display:none">Note</th>
								<th style="display:none">id</th>
								<th class="text-xs-left">Action</th>
							</tr>
						</thead>
						<?php $i =1; ?>
						<tbody>
							@foreach ($items as $item)
							@if($item->status == "Available")
							<tr>
								<th class="pos-left"><?= $i; ?></th>
								<td class="pos-left">{{ $item->custom_id }}</td>
								<td class="pos-left">{{ $item->name }}</td>
								<td class="pos-left">{{ $item->location }}</td>
								<td class="pos-left">{{ $item->category->name }}</td> 
								{{-- <td>{{ date('Y', strtotime($item->bought_year)) }}</td>  --}}
								<td style="display:none" id="itemnote<?= $i; ?>">{{  $item->note }}</td>
								<td style="display:none" id="itemid<?= $i++; ?>">{{  $item->id }}</td>
								<td class="pos-left"> 
									<button class="btn btn-primary rentbtn hvr-box-shadow-outset"
									data-toggle="modal" 
									href="#RentConfirmModal"
									data-item="{{ $item }}"
									>Rent</button>
								</td>
							</tr>
							@endif
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
			{{-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> --}}
		</div>
	</div>
</div>

<!-- Modal2 -->
<div class="modal hide fade" id="RentConfirmModal" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="myModalLabel2" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="itemid"></h4>
				<h4 class="modal-title" id="itemname"></h4>
				
			</div>
			<form action="" method="POST" id="formforrent">
			<div class="modal-body">
				
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-group">
						<label for="itemsnote">item's note:</label>
						<textarea name="itemsnote" class="form-control" id="itemsnote" rows="3" readonly >{{ old('itemsnote') }}</textarea>
					</div>

					<div class="form-group">
						<label for="RentDate">Rent Date <?= requireTxt(); ?>:</label>
						<input type="date" name="RentDate" class="form-control" id="RentDate" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
					</div>

					<div class="form-group">
						<label for="ReturnDate">Return Date <big>(Optional)</big>:</label>
						<input type="date" name="ReturnDate" class="form-control" id="ReturnDate" value="{{ old('Return Date') }}">
					</div>

					<div class="form-group">
						<label for="Note">Note <big>(Optional)</big>:</label>
						<textarea name="Note" class="form-control" rows="4" id="Note" value="{{ old('Note') }}"></textarea>
					</div>

					<input type="text" name="hiddenid" id="hiddenid" value="" style="display:none">

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-close btn-secondary hvr-box-shadow-outset" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary hvr-box-shadow-outset">Rent</button>
			</div>
			</form>
		</div>
	</div>
</div>
