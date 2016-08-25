@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div class="col-sm-10 offset-sm-1" id="grid-body">
    <div class="card card-block shadow" id="table-container">
        <h3 class="card-title text-xs-center">
            Item List
        </h3>
        <div class="pull-xs-right" id="header-button">
            <!-- Button trigger modal -->
            <a class="btn btn-primary btn-block btn-circle float-shadow" data-toggle="modal" href="#adminAddNew" role="button">
                <h4 style="margin-top: 10px;">
                    <b>
                        +
                    </b>
                </h4>
            </a>
        </div>
        <div class="table-responsive">
            @include('admin.adminItemList')
        </div>
    </div>
</div>
@include('modals.adminEditModal')
@include('modals.adminAddNewItem')
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#tableItemAdmin').DataTable({
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


