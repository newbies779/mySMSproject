<table class="table table-hover" style="width: 100%;" cellspacing="0" id="tableReview">
	<thead>
		<tr>
			<th class="text-xs-center">#</th>
			<th class="text-xs-left">Item ID</th>
			<th class="text-xs-left">Name</th>
			<th class="text-xs-left">Status</th>
			<th class="text-xs-left">Note</th>
            <th class="text-xs-left">Last updated</th>
			<th class="text-xs-left">Action</th>
			<th style="display:none">itemid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>

		@foreach ($reviewItem as $item)

			<tr>
				<th class="text-xs-center" scope="row"><?= $i ?></th>
				<td class="pos-left"> {{ $item->custom_id }} </td>
				<td class="pos-left">{{ $item->name }}</td>
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
				<td class="pos-left"> {{ substr($item->note,0,80) }} </td>
				<td class="pos-left"> {{ date('d-m-Y', strtotime($item->updated_at))}} </td>			
				<td class="pos-left">
                    <button class="btn btn-sm btn-primary" 
                    data-toggle="modal" 
                    href="#modalEditReview" 
                    data-row="<?= $i ?>" 
                    data-item="{{ $item }}">
                    Review
                    </button>            
                </td>

				{{-- Hidden Information --}}					
				<td style="display:none">{{  $item->id }}</td>
			</tr>

		@endforeach

	</tbody>
</table>

@section('script')
<script>
var reviewData = {};
var modal = $('#modalEditReview');

    $(document).ready(function() {
        $('#reviewnav').addClass("active");
        
        setTimeout(function() {
            $('#flash').fadeOut('slow');
            }, 3000); // <-- time in milliseconds

        $('#tableReview').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true,
            "pageLength": 25,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
        });

        $('#modalEditReview').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var item = button.data('item');
            reviewData["id"] = item.id;

            modal.find('.active').removeClass('active');
            modal.find('#reviewNote').val('');
            modal.find('.modal-title').html('Review&nbsp;to&nbsp;<strong>' + item.name + '</strong>&nbsp;' + item.custom_id);
            modal.find('#reviewNote').val( item.note );
            modal.find('input[value='+ item.status +']').parent('label').addClass('active');

            $('label.btn').click(function() {
                reviewData["status"] = $(this).children('input[name="options"]').val();
                //console.log(reviewData);
            });

            $('#reviewNote').change(function() {
                var review_note = $(this).val();
                reviewData["note"] = review_note;
                //console.log(reviewData);
            }); 
        });

        $('form#reviewForm').submit(function(e) {
            console.log(reviewData);
            var id = $("<input>")
               .attr("type", "hidden")
               .attr("name", "id").val(reviewData.id);
            var status = $("<input>")
               .attr("type", "hidden")
               .attr("name", "status").val(reviewData.status);
            var note = $("<input>")
               .attr("type", "hidden")
               .attr("name", "note").val(reviewData.note);
            $(this).append($(id),$(status),$(note));
            return true;
        });
    });
</script>
@stop

