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
						<th class="text-xs-center" scope="row"><?= $i ?></th>
						<td class="pos-left" id="td-rentdate<?= $i; ?>"> {{ date('d-m-Y', strtotime($rent->rent_date))}} </td>
						<td class="pos-left" id="td-requser<?= $i; ?>">{{ $rent->user->name }}</td>
						<td class="pos-left" id="td-itemreq<?= $i; ?>">{{ $rent->item->name }}</td>
						<td class="pos-left" id="td-rentreqdate<?= $i; ?>"> {{ date('d-m-Y', strtotime($rent->rent_req_date))}} </td>
						<td class="pos-left" id="td-rentstat<?= $i; ?>">
							 @if ($rent->rent_status == "Approved")
		                        <span class="tag tag-success">
		                    @elseif ($rent->rent_status == "Pending")
		                        <span class="tag tag-warning">
		                    @endif
		                    {{ $rent->rent_status }}</span>
						</td>
						<td class="pos-left" id="td-returnreqdate<?= $i; ?>"> @if(!is_null($rent->return_req_date)){{ date('d-m-Y', strtotime($rent->return_req_date))}} @endif </td>
						<td class="pos-left" id="td-rentstat<?= $i; ?>">
							@if ($rent->return_status == "Approved")
		                        <span class="tag tag-success">
		                    @elseif ($rent->return_status == "Pending")
		                        <span class="tag tag-warning">
		                    @elseif ($rent->return_status == "No")
		                        <span class="tag tag-default">
		                    @endif
		                    {{ $rent->return_status }}</span>
						</td>
						<td class="pos-left" id="td-rentdetail<?= $i; ?>" class="text-xs-center"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td>
						<!-- Button Rent Trigger Modal -->
						
							<td class="pos-left">
								<button type="button" class="btn btn-sm btn-primary rent-approve"
								data-toggle="modal"
								data-target ="#rentApproveModal" 
								data-row="<?= $i ?>"
								data-itemcustomid="{{ $rent->item->custom_id }}"
								data-itemname="{{ $rent->item->name }}"
								data-itemnote="{{ $rent->item->note }}"
								data-itemstatus="{{ $rent->item->status }}"
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
								data-itemcustomid="{{ $rent->item->custom_id }}"
								data-itemname="{{ $rent->item->name }}"
								data-itemnote="{{ $rent->item->note }}"
								data-itemstatus="{{ $rent->item->status }}" 
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

@include('showModalApprove')

