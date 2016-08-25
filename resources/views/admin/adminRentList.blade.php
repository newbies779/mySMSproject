<table class="table table-hover" style="width: 100%;" cellspacing="0" id="table-admin">
	<thead>
		<tr>
			<th class="text-xs-left">#</th>
			<th class="text-xs-left">Date</th>
			<th class="text-xs-left">Time</th>
			<th class="text-xs-left">User</th>
			<th class="text-xs-left">Item</th>
			<th class="text-xs-left">Rent Date</th>
			<th class="text-xs-left">Rent Status</th>
			<th class="text-xs-left">Return Date</th>
			<th class="text-xs-left">Return Status</th>
			<th class="text-xs-left">Rent Action</th>
			<th class="text-xs-left">Return Action</th>
			<th style="display:none">noterent</th>
			<th style="display:none">notereturn</th>
			<th style="display:none">rentid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($rentList as $rent)

					<tr>
						<td class="pos-left" scope="row"><b><?= $i ?></b></td>
						<td class="pos-left" id="td-rentdate<?= $i; ?>"> {{ date('d/m/y', strtotime($rent->created_at))}} </td>
						<td class="pos-left" id="td-renttime<?= $i; ?>">{{ date('H:i', strtotime($rent->created_at))}}</td>
						<td class="pos-left" id="td-requser<?= $i; ?>">{{ $rent->user->name }}</td>
						<td class="pos-left" id="td-itemreq<?= $i; ?>">{{ $rent->item->name }}</td>
						<td class="pos-left" id="td-rentreqdate<?= $i; ?>"> {{ date('d/m/y', strtotime($rent->rent_req_date))}} </td>
						<td class="pos-left" id="td-rentstat<?= $i; ?>">
							 @if ($rent->rent_status == "Approved")
		                        <span class="tag tag-success">
		                    @elseif ($rent->rent_status == "Pending")
		                        <span class="tag tag-warning">
		                    @endif
		                    {{ $rent->rent_status }}</span>
						</td>
						<td class="pos-left" id="td-returnreqdate<?= $i; ?>"> @if(!is_null($rent->return_req_date)){{ date('d/m/y', strtotime($rent->return_req_date))}} @endif </td>
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
						<!-- Button Rent Trigger Modal -->
						
							<td class="pos-left">
								<button type="button" class="btn btn-sm btn-primary rent-approve"
								data-toggle="modal"
								data-target ="#rentApproveModal" 
								data-row="<?= $i ?>"
								data-itemcustomid="{{ $rent->item->custom_id }}"
								data-itemname="{{ $rent->item->name }}"
								data-itemnote="{{ $rent->rent_req_note }}"
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
								data-itemnote="{{ $rent->return_req_note }}"
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

@include('modals.showModalApprove')

