@extends('layouts.adminsmslayout')

@section('header')
@include('showerror')
@include('flash')
<div id="header-button" class="col-xs-12 col-sm-4 pull-md-right">
    {{-- @include('dumpDB') --}}
    @include('modals/adminEditModal')
    
</div>

@stop

@section('tableContent')
<<<<<<< HEAD

<div id="grid-body">
    <div id="table-container" class="card card-block shadow">
        <h3 class="card-title text-xs-center">Item List</h3>
        <div id="header-button" class="pull-xs-right">
            @include('modals/adminAddNewItem')
        </div>
        <div class="table-responsive">
            @include('admin.adminItemList')
        </div>
    </div>
=======
<div id="grid-body" class="col-sm-10 offset-sm-1">
  <div id="table-container" class="card card-block shadow">
   <h3 class="card-title text-xs-center">Item List</h3>
   <div class="table-responsive">
    @include('admin.adminItemList')
</div>
</div>
>>>>>>> 987ca6b6e65053b654ff9eb382a0335e5f9b0730
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
        $('#editnav').addClass("active");

        $(".iconhover").hover(
          function () {
            var row = ($(this).data('row'));
            $(this).attr("title",$("#noteforitemlist"+row).html());
        });

        $('.adminEdit').click(function () {

            var row = ($(this).data('row'));
            var itemId = ($(this).data('itemID'));
            var itemdata = ($(this).data('itemdata'));
            //set default for status dropdown
            var statusSelector = document.getElementById('statusSelector');
            switch(itemdata.status){
                case 'Available':
                statusSelector.selectedIndex = 0;
                break;
                case 'Broken':
                statusSelector.selectedIndex = 1;
                break;
                case 'Borrowed':
                statusSelector.selectedIndex = 2;
                break;
                case 'Lost':
                statusSelector.selectedIndex = 3;
                break;
                case 'Repairing':
                statusSelector.selectedIndex = 4;
                break;
                case 'Reserved':
                statusSelector.selectedIndex = 5;
                break;
                case 'ReturnPending':
                statusSelector.selectedIndex = 6;
                break;
            }
            
            
            $('#itemid').val(itemdata.custom_id);
            $('#itemname').val(itemdata.name);
            $('#location').val(itemdata.location);
            $('#note').val(itemdata.note);
            $('#bought_year').val(itemdata.bought_year);
            $('form#formForAdminEdit').attr('action','item/'+ itemdata.id); 
            
        });


        
    });
</script>
@stop