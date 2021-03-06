<table class="table table-hover" style="width: 100%;" cellspacing="0" id="tableItemAdmin">
	<thead>
		<div class="btn-group" role="button" arial-label="Import/Export" style="padding: 0.5rem;">
			<a  class="btn btn-primary btn-sm" data-toggle="modal" href="#adminImportItem">
				Import
			</a>
			<a href="{{ URL::to('export') }}" class="btn btn-secondary btn-sm" >
				Export
			</a>
		</div>
		<tr>
			<th class="text-xs-center">#</th>
			<th class="text-xs-left">Custom ID</th>
			<th class="text-xs-left">Name</th>
			<th class="text-xs-left">Status</th>
			<th class="text-xs-left">Location</th>
			<th class="text-xs-left">Assignee</th>
			<th class="text-xs-left">Note</th>
			{{-- <th class="text-xs-left">Bought date</th> --}}
			<th class="text-xs-left category" style="display:none;">Category</th>
			<th class="text-xs-left"></th>
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
			<td class="pos-left"><?= $i; ?></td>
			<td class="pos-left"><?= $item->custom_id; ?></td>
			<td class="pos-left limit-text"><?= $item->name; ?></td>
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
					{{ $item->users->name }}
				@else {{ 'No' }}
				@endif
			</td>
			{{-- <td class="pos-left iconpopover" data-toggle="popover" data-container="body" data-placement="bottom" data-content="{{ $item->note }}" title="Note"><i class="fa fa-info-circle fa-fw fa-2x" aria-hidden="true"></i></td> --}}
			<td>{{ $item->note }}</td>
			<!-- <td class="pos-left"> 
				<?php if($item->bought_year != "") : ?>
					{{-- {{ date('d/m/y',strtotime($item->bought_year)) }}  --}}
				<?php endif ?>
			</td> -->
			<td class="pos-left" style="max-height:100px;max-width:150px;word-wrap:break-word;overflow:hidden;display:none;"><?= $item->category->name; ?></td>
			<td class="pos-left">
						<button 
						type="button" 
						class="btn btn-primary btn-sm adminEdit"  
						data-toggle="modal" 
						href="#adminEditItem" 
						id="adminEditButton<?= $i; ?>"
						data-row="<?= $i++; ?>" 
						data-itemdata='<?= json_encode($item); ?>'
						>Edit</button>
			</td>
		</tr>

		@endforeach

	</tbody>
</table>

{{-- Include File --}}

@include('modals.adminImportModal')

