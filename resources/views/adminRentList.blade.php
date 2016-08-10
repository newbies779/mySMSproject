<table class="table table-bordered table-hover table-striped" id="table-admin">
	<thead class="thead-default">
		<tr>
			<th>#</th>
			<th>Request Date</th>
			<th>User</th>
			<th>Item</th>
			<th>Rent Date</th>
			<th>Rent Status</th>
			<th>Return Date</th>
			<th>Return Status</th>
			<th>Details</th>
			<th>Rent Action</th>
			<th>Return Action</th>
			<th style="display:none">noterent</th>
			<th style="display:none">notereturn</th>
			<th style="display:none">rentid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($rentList as $rent)

			<tr>
				<th class="pull-xs-right" scope="row"><?= $i ?></th>
				<td id="td-rentdate<?= $i; ?>"> {{ date('d-m-Y', strtotime($rent->rent_date))}} </td>
				<td id="td-requser<?= $i; ?>">{{ $rent->user->name }}</td>
				<td id="td-itemreq<?= $i; ?>">{{ $rent->item->name }}</td>
				<td id="td-rentreqdate<?= $i; ?>"> {{ date('d-m-Y', strtotime($rent->rent_req_date))}} </td>
				<td id="td-rentstat<?= $i; ?>" style="<?php if($rent->rent_status == "Approved") echo "background-color: #e2ebf7";else echo "background-color: #fcf2e4;" ?>" >{{ $rent->rent_status }}</td>
				<td id="td-returnreqdate<?= $i; ?>"> {{ date('d-m-Y', strtotime($rent->return_req_date))}} </td>
				<td id="td-rentstat<?= $i; ?>" style="<?php if($rent->return_status == "Yes") echo "background-color: #e2ebf7";else echo "background-color: #fcf2e4;" ?>" >{{ $rent->return_status }}</td>
				
				<td id="td-rentdetail<?= $i; ?>" class="text-xs-center"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td>
				<!-- Button Rent Trigger Modal -->
				
					<td align="center">
						<button type="button" class="btn btn-outline-primary rent-approve"
						data-toggle="modal"
						data-target ="#rentApproveModal" 
						data-row="<?= $i ?>"
						data-itemcustomid="{{ $rent->item->custom_id }}"
						data-itemname="{{ $rent->item->name }}"
						data-itemnote="{{ $rent->item->note }}"
						data-itemstatus="{{ $rent->item->status }}"
						<?php if($rent->rent_status == "Approved" || $rent->return_status == "Yes") echo "disabled"; ?>>
								@if ($rent->rent_status == "Pending")
									Approve
								@else
									Already Approved
								@endif
						</button>
					</td>
				
				<!-- Button Return Approve -->
					<td align="center">
						<button type="button" class="btn btn-outline-warning return-approve"  
						data-toggle="modal"
						data-target ="#returnApproveModal" 
						data-row="<?= $i ?>" 
						data-itemcustomid="{{ $rent->item->custom_id }}"
						data-itemname="{{ $rent->item->name }}"
						data-itemnote="{{ $rent->item->note }}"
						data-itemstatus="{{ $rent->item->status }}" 
						<?php if($rent->return_status == "Yes") echo "disabled"; ?>>
							@if ($rent->return_status == "No")
								Approve
							@else
								Already Approved
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

@include('showModalApprove')

