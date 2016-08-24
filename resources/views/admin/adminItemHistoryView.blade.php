<table class="table table-hover" style="width: 100%;" cellspacing="0" id="tableHistory">
	<thead>
		<tr>
			<th class="text-xs-left" style="width:20%;">Time</th>
			<th class="text-xs-left" style="width:20%;">User</th>
			<th class="text-xs-left"></th>
			<th style="display:none">logid</th>
		</tr>
	</thead>
	<tbody>

		<?php $i = 1; ?>
		@foreach ($logs as $log)

			<tr>
				<td class="pos-left"><pre>{{ date('d/m/y H:i', strtotime($log->created_at)) }}</pre></td>
				<td class="pos-left">{{ $log->user->name }}</td>
				<td class="pos-left">
                    <a class="idTrackable" href="#" target="_top">
                    <small style="color: #909090;">{{ $log->item->custom_id}}</small>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if ($log->status == "Reserved")
                        <span class="tag tag-success">
                    @elseif ($log->status == "Available")
                        <span class="tag tag-info">
                    @elseif ($log->status == "Repairing")
                        <span class="tag tag-warning">
                    @elseif ($log->status == "Borrowed")
                        <span class="tag tag-borrow">
                    @elseif ($log->status == "Broken")
                        <span class="tag tag-danger">
                    @elseif ($log->status == "Lost")
                        <span class="tag tag-default">
                    @endif
                    {{ $log->status }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>{{ $log->item->name}}</strong>

                </td>			
				{{-- Hidden Information --}}					
				<td style="display:none">{{  $log->id }}</td>
			</tr>

		@endforeach

	</tbody>
</table>

@section('script')
<script>
var reviewData = {};
var modal = $('#modalEditReview');

    $(document).ready(function() {
        $('#historynav').addClass("active");
        
        setTimeout(function() {
            $('#flash').fadeOut('slow');
            }, 3000); // <-- time in milliseconds

        $('#tableHistory').DataTable({
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
            modal.find('.modal-header').addClass(item.status);
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

