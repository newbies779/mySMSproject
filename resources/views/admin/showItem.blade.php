@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')
@stop

@section('tableContent')
<div id="grid-body" class="col-sm-12">
  <div id="table-container" class="card card-block shadow">
   <h3 class="card-title text-xs-center">Item List</h3>
   <div class="table-responsive">
    @include('admin.adminItemList')
</div>
</div>
</div>
@stop

@section('script')

<script>
    $(document).ready(function() {
        $('#table_item_admin').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true,
            "pageLength": 25,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(".iconhover").hover(
          function () {
            var row = ($(this).data('row'));
            $(this).attr("title",$("#noteforitemlist"+row).html());
        },
        function () {

        }
        );

        
    });
</script>
@stop