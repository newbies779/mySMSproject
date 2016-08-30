@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

@stop

@section('tableContent')
<div id="grid-lside" class="col-sm-2">
    @include('admin.category_component')
</div>

<div class="col-sm-10 offset-sm-2" id="grid-body">
    <div class="card card-block shadow" id="table-container" style="height: 85%;">
        <div class="table-responsive">
            @include('admin.adminItemList')
        </div>
    </div>
</div>
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
            "scrollY":        "55vh",
            "scrollCollapse": true,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.showall').addClass('active');

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

        var table = $('#tableItemAdmin').DataTable();

        // $('.cate_hover').click(function(e){
        //     $('.cate_hover').removeClass('active');
        //     table.search($(this).children().find('label').html()).draw();
        //     $(this).addClass('active');
        // });

        $('.cate_hover').click(function(e){
            $('.showall').removeClass('active');
            $('.cate_hover').removeClass('active');
            table.search($(this).children().find('label').html()).draw();
            $(this).addClass('active');
        });

        $('.showall').click(function(e){
            $('.showall').removeClass('active');
            $('.cate_hover').removeClass('active');
            table.search('').draw();
            $(this).addClass('active');
        });

        $('.categoryEdit').click(function(e){
            var category = $(this).data("category");
            console.log(category);
            $('#adminEditCategory').find('#name').val($(this).parent().find('label').html());
            $('#formForEditCategory').attr('action','category/'+category.id);
        })
    });
</script>

@stop
{{-- Include Modals --}}

@include('modals.adminEditModal')
@include('modals.adminAddNewItem')
@include('modals.adminAddCategory')
@include('modals.adminEditCategory')


