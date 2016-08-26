@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div id="grid-lside" class="col-sm-2">
    <div class="col-sm-10 offset-sm-1 pull-xs-center" id="header-button">
        <!-- Button trigger modal -->
        <button class="btn btn-primary btn-block hvn-btn-shadow-outset" data-toggle="modal" href="#adminAddNew" role="button">
            <span style="margin-top: 10px;">
                <b>
                    NEW
                </b>
            </span>
        </button>
    </div>
    <div class="card panel-shadow content list-group">
        <div class="card-block shadow">          
                <h5 class="card-title text-sm-center">Category</h5>
        </div>
        <div href="#" class="list-group-item list-group-item-action">
            <span>Item History</span>
        </div>
        <div href="#" class="list-group-item list-group-item-action">
            <span>User History</span>
        </div>
    </div>  
</div>

<div class="col-sm-10 offset-sm-2" id="grid-body">
    <div class="card card-block shadow" id="table-container">
        <div class="table-responsive">
            @include('admin.adminItemList')
        </div>
    </div>
</div>
@include('modals.adminEditModal')
@include('modals.adminAddNewItem')
@stop

@section('content')

@include('modals.adminEditModal')
@include('modals.adminAddNewItem')

@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#tableItemAdmin').DataTable({
            "dom": '<"toolbar row"<"col-sm-6"l><"col-sm-6"f>>rtip',
            "paging":   true,
            "ordering": true,
            "info":     true,
            "pageLength": 25,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "scrollY":        "50vh",
            "scrollCollapse": true,
        });
    });
</script>
<script>
    $(document).ready(function() {

        var modal = $('#adminEditItem');

        $('#editnav').addClass("active");

        $('#adminEditItem').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var item = button.data('itemdata');
            
            //set default for status dropdown
            var spanStatus = $('#spanStatus');
            switch(item.status){
                case 'Available':
                    spanStatus.attr('class','tag tag-info')
                    break;
                case 'Broken':
                    spanStatus.attr('class','tag tag-danger')
                    break;
                case 'Borrowed':
                    spanStatus.attr('class','tag tag-borrow')
                    break;
                case 'Lost':
                    spanStatus.attr('class','tag tag-lost')
                    break;
                case 'Repairing':
                    spanStatus.attr('class','tag tag-warning')
                    break;
                case 'Reserved':
                    spanStatus.attr('class','tag tag-success')
                    break;
                case 'ReturnPending':
                    spanStatus.attr('class','tag tag-return-pending')
                    break;
                case 'Unavailable':
                    spanStatus.attr('class','tag tag-unavailable')
                    break;
                }
                spanStatus.html(item.status);
                $('#inputStatus').val(item.status);

                $('#itemid').val(item.custom_id);
                $('#itemname').val(item.name);
                $('#location').val(item.location);
                $('#note').val(item.note);
                $('#bought_year').val(item.bought_year);
                $('form#formForAdminEdit').attr('action','item/'+ item.id); 

            });
    });
</script>

@stop


