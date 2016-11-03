<table class="table table-hover" style="width: 100%;" cellspacing="0" id="table-admin">
	<thead>
		<tr style="display:none;">
			<th class="text-xs-left">#</th>
			<th class="text-xs-left">Date</th>
			<th class="text-xs-left">Time</th>
			<th class="text-xs-left">User</th>
			<th class="text-xs-left">Item</th>
			<th class="f-2 text-xs-left">Rent Date</th>
			<th class="f-2 text-xs-left">Rent Status</th>
			<th class="f-2 text-xs-left">Return Date</th>
			<th class="f-2 text-xs-left">Return Status</th>
			<th class="f-2 text-xs-left">Rent Action</th>
			<th class="f-2 text-xs-left">Return Action</th>
			<th style="display:none">noterent</th>
			<th style="display:none">notereturn</th>
			<th style="display:none">rentid</th>
		</tr>
	</thead>
	<tbody>

	<?php $i = 1; ?>

	@foreach ($rentList as $rent)

	<tr @if ($rent->rent_status == "Approved")
		style="display:none;" 
	@endif>
		<td class="pos-left" scope="row"><b><?= $i ?></b></td>
		<td class="pos-left"> {{ date('d/m/y', strtotime($rent->created_at))}} </td>
		<td class="pos-left">{{ date('H:i', strtotime($rent->created_at))}}</td>
		<td class="pos-left">{{ $rent->user->name }}</td>
		<td class="pos-left">{{ $rent->item->name }}</td>
		<td class="pos-left"> {{ date('d/m/y', strtotime($rent->rent_req_date))}} </td>
		<td class="pos-left">
			@if ($rent->rent_status == "Approved")
			<span class="tag tag-success">
				@elseif ($rent->rent_status == "Pending")
				<span class="tag tag-warning">
					@endif
					{{ $rent->rent_status }}</span>
				</td>
				<td class="pos-left"  
					<?php if(strtotime('now') >= strtotime($rent->return_date)) : ?>
						style = "color:red"
					<?php endif ?>
				> 
				@if (!is_null($rent->return_date))
				{{ date('d/m/y', strtotime($rent->return_date)) }}
				@else
				@if(!is_null($rent->return_req_date)){{ date('d/m/y', strtotime($rent->	return_req_date))}} 
				@endif
				@endif
			</td>
			<td class="pos-left">
				@if ($rent->return_status == "Approved")
				<span class="tag tag-success">
					@elseif ($rent->return_status == "Pending")
					<span class="tag tag-warning">
						@elseif ($rent->return_status == "No")
						{{-- <span class="tag tag-default"> --}}
							@endif
							{{-- {{ $rent->return_status }} --}}</span>
						</td>
						<!-- Button Rent Trigger Modal -->

						<td class="pos-left">
							<button type="button" class="btn btn-sm btn-primary rent-approve"
							data-toggle="modal"
							data-target ="#rentApproveModal" 
							data-row="<?= $i ?>"
							data-rent = "{{ $rent }}"
							data-rentItem = "{{ $rent->item }}"
							<?php if($rent->rent_status == "Approved") echo "disabled"; ?>>
							@if ($rent->rent_status == "Pending")
							Approve
							@else
							Approved
							@endif
						</button>
					</td>

					<!-- Button Return Approve -->
					<td class="pos-left">
						<button type="button" class="btn btn-sm btn-warning return-approve"  
						data-toggle="modal"
						data-target ="#returnApproveModal" 
						data-row="<?= $i ?>"
						data-rent = "{{ $rent }}"
						<?php if($rent->return_status != "Pending") echo " disabled"; ?>>
						@if ($rent->return_status != "Approved")
						Approve
						@else
						Approved
						@endif
					</button>
				</td>

				{{-- Hidden Information --}}
				<td style="display:none" id="noteForRent<?= $i; ?>">{{  $rent->item->rent_req_note }}</td>
				<td style="display:none" id="noteForReturn<?= $i; ?>">{{  $rent->item->return_req_note }}</td>
				<td style="display:none" id="rentId<?= $i++; ?>">{{  $rent->id }}</td>
			</tr>

			@endforeach
	</tbody>
</table>

		{{-- Include File --}}

		@include('modals.showModalApprove')

		@section('script')
		<script>
			$(document).ready(function() {
				$('#table-admin').DataTable({
					"dom": '<t><"bottom"p><"clear">',
					"paging":   true,
					"ordering": true,
					"info":     true,
					"pageLength": 10,
					"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
				});
			});
		</script>

		<script>
			$(document).ready(function() {

				$('#homenav').addClass("active");

				setTimeout(function() {
					$('#flash').fadeOut('slow');
            }, 3000); // <-- time in milliseconds

        // on Modal rent approve show
        $('#rentApproveModal').on('show.bs.modal', function(e) {
        	var modal = $(this);
        	var button = $(e.relatedTarget);
        	var rent = button.data('rent');
            //console.log(rent.item.custom_id);
            modal.find('#icustomId').text(rent.item.custom_id);
            modal.find('#iname').text(rent.item.name);
            modal.find('#istatus').text(rent.item.status);
            modal.find('#inote').text(rent.rent_req_note);

            modal.find('#formRentApprove').attr('action','rent/approve/'+rent.id);
        });

        // on Modal return approve show
        $('#returnApproveModal').on('show.bs.modal', function(e) {
        	var modal = $(this);
        	var button = $(e.relatedTarget);
        	var rent = button.data('rent');
            //console.log(rent.item.custom_id);
            modal.find('#rcustomId').text(rent.item.custom_id);
            modal.find('#rname').text(rent.item.name);
            modal.find('#rstatus').text(rent.item.status);
            modal.find('#rnote').text(rent.return_req_note);

            modal.find('#formReturnApprove').attr('action','return/approve/'+rent.id);
        });

    });

</script>

@stop
