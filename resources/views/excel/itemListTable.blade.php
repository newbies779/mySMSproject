<table class="table table-hover" style="width: 100%;" cellspacing="0" id="tableItemAdmin">
	<thead>
		<tr>
			<th class="text-xs-center">#</th>
			<th class="text-xs-left">Custom ID</th>
			<th class="text-xs-left">Name</th>
			<th class="text-xs-left">Status</th>
			<th class="text-xs-left">Location</th>
			<th class="text-xs-left">Assignee</th>
			<th class="text-xs-left">Category</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($items as $item)
		<?php 
			$item = json_encode($item);
			$item = str_replace("'","&#39",$item);
			$item = json_decode($item);
			// dd($item);
		 ?>
		<tr>
			<td class="pos-left"><?= $i++; ?></td>
			<td class="pos-left"><?= $item->custom_id; ?></td>
			<td class="pos-left" style="max-height:100px;max-width: 100px;word-wrap:break-word;overflow:hidden"><?= $item->name; ?></td>
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
                    <span class="tag tag-lost">
                @elseif ($item->status == "ReturnPending")
                    <span class="tag tag-return-pending">
                @elseif ($item->status == "Unavailable")
                    <span class="tag tag-default">
                @endif
                {{ $item->status }}
                </span>
			</td>
			<td class="pos-left"><?= $item->location; ?></td>
			<td class="pos-left">
				@if (!is_null($item->assignee_id))
					<?= $item->assignee_id ?>
				@else <?= 'No' ?>
				@endif
			</td>
			<td class="pos-left" style="max-height:100px;max-width:150px;word-wrap:break-word;overflow:hidden"><?= $item->category->name; ?></td>
		</tr>

		@endforeach

	</tbody>
</table>

{{-- Include File --}}

{{-- @include('showModalApprove') --}}

