<table class="table table-hover" style="width: 100%;" cellspacing="0" id="tableItemAdmin">
	<thead>
		<tr>
			<th class="text-xs-center">#</th>
			<th class="text-xs-left">Custom ID</th>
			<th class="text-xs-left">Name</th>
			<th class="text-xs-left">Status</th>
			<th class="text-xs-left">Location</th>
			<th class="text-xs-left">Note</th>
			<th class="text-xs-left">Bought_year</th>
			<th class="text-xs-left">CategoryName</th>
			<th class="text-xs-left">Action</th>
			<th style="display:none">noterent</th>
			<th style="display:none">notereturn</th>
			<th style="display:none">rentid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($items as $item)
		<tr>
			<td><?= $item->id; ?></td>
			<td><?= $item->custom_id; ?></td>
			<td><?= $item->name; ?></td>
			<td><?= $item->status; ?></td>
			<td><?= $item->location; ?></td>
			<td class="text-xs-center iconhover" data-toggle="tooltip" title="" data-row="<?= $i; ?>"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td>
			<td><?= date('d/m/y',strtotime($item->bought_year)); ?></td>
			<td><?= $item->category->name; ?></td>
			<td align="center">
			<button type="button" class="btn btn-primary adminEdit"  data-toggle="modal" href="#adminEditItem" id="adminEditButton<?= $i; ?>" data-row="<?= $i; ?>" data-itemid="<?= $item->custom_id ?>" data-itemdata='<?= $item; ?>'>Edit</button>

		<tr>
			<td class="text-xs-center" scope="row"><?= $i; ?></td>
			<td class="pos-left"><?= $item->custom_id; ?></td>
			<td class="pos-left"><?= $item->name; ?></td>
			<td class="pos-left">
				@if ($item->status == "Reserved")
                        <span class="tag tag-success">
                    @elseif ($item->status == "Available")
                        <span class="tag tag-info">
                    @elseif ($item->status == "Repairing")
                        <span class="tag tag-warning">
                    @elseif ($item->status == "Borrowed")
                        <span class="tag tag-borrow">
                    @elseif ($item->status == "Broken")
                        <span class="tag tag-danger">
                    @elseif ($item->status == "Lost")
                        <span class="tag tag-default">
                    @endif
                    {{ $item->status }}</span>
			</td>
			<td class="pos-left"><?= $item->location; ?></td>
			<td class="pos-left iconhover" data-toggle="tooltip" title="" data-row="<?= $i; ?>"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td>
			<td class="pos-left"><?= date('d/m/y',strtotime($item->bought_year)); ?></td>
			<td class="pos-left"><?= $item->category->name; ?></td>
			<td class="pos-left">
				<button type="button" class="btn btn-sm btn-primary">Return</button>
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

