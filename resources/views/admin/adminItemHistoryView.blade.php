<table cellspacing="0" class="table table-hover" id="tableHistory" style="width: 100%;">
    <thead>
        <tr>
            <th class="text-xs-left" style="width:20%;">
                Date time
            </th>
            <th class="text-xs-left" style="width:20%;">
                User
            </th>
            <th class="text-xs-left">
            </th>
            <th style="display:none">
                logid
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($logs as $log)
        <tr>
            <td class="pos-left">
                <pre>{{ date('d/m/y H:i', strtotime($log->created_at)) }}</pre>
            </td>
            <td class="pos-left">
                {{ $log->user->name }}
            </td>
            <td class="pos-left history-status">
                <div class="row">
<<<<<<< HEAD
                    <div class="col-sm-1" style="margin-right: 10px;">
=======
                    <div class="col-sm-2">
>>>>>>> d47270861dfb5ec297b816c3b66c1083408a37d7
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
                                            <span class="tag tag-lost">
                                                @elseif ($log->status == "ReturnPending")
                                                <span class="tag tag-return-pending">
                                                    @elseif ($log->status == "Unavailable")
                                                    <span class="tag tag-default">
                                                        @endif
                        {{ $log->status }}
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </div>
                    <div>
                        <span>
                            <strong>
                                {{ $log->item->name}}
                            </strong>
                        </span>
                    </div>
                </div>
                <div class="row">
<<<<<<< HEAD
                    <div class="col-sm-1" style="margin-right: 10px;"></div>
=======
                    <div class="col-sm-2"></div>
>>>>>>> d47270861dfb5ec297b816c3b66c1083408a37d7
                    <div>
                        <small style="color: #909090;">
                            ID: {{ $log->item->custom_id}}
                        </small>
                    </div>
                </div>
            </td>
            {{-- Hidden Information --}}
            <td style="display:none">
                {{  $log->id }}
            </td>
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
    });
</script>
@stop
