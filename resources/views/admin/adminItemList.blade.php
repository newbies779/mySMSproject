<table class="table table-bordered table-hover table-striped" id="table_item_admin">
	<thead class="thead-default">
		<tr>
			<th>#</th>
			<th>Custom ID</th>
			<th>Name</th>
			<th>Status</th>
			<th>Location</th>
			<th>Note</th>
			<th>Bought_year</th>
			<th>CategoryName</th>
			<th>Action</th>
			<th style="display:none">noterent</th>
			<th style="display:none">notereturn</th>
			<th style="display:none">rentid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($items as $item)

		<tr>
			<td><?= $i; ?></td>
			<td><?= $item->custom_id; ?></td>
			<td><?= $item->name; ?></td>
			<td><?= $item->status; ?></td>
			<td><?= $item->location; ?></td>
			<td class="text-xs-center iconhover" data-toggle="tooltip" title="" data-row="<?= $i; ?>"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td>
			<td><?= date('d/m/y',strtotime($item->bought_year)); ?></td>
			<td><?= $item->category->name; ?></td>
			<td align="center">
				<button type="button" class="btn btn-primary">Return</button>
			</td>
			<td id="noteforitemlist<?= $i++; ?>" style="display:none"><?= $item->note ?></td>
			<td style="display:none"><?= '123' ?></td>
			<td style="display:none"><?= '123' ?></td>
		</tr>

		@endforeach

	</tbody>
</table>

{{-- Include File --}}

{{-- @include('showModalApprove') --}}

