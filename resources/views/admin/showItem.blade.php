@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')
@stop

@section('tableContent')
<div class="container-fluid" id="tableContent">
    @include('modals.adminEditModal')
    @include('modals.adminAddNewItem')
    @include('modals.adminAddCategory')
    @include('modals.adminEditCategory')
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
            "scrollY":        "48vh",
            "scrollCollapse": true,
            "columnDefs": [
                        { width: 300, targets: 6 }
                    ],
        });
    });
</script>
<script>
    var data = {};
    $(document).ready(function() {
        var modal = $('#adminEditItem');

        $(function () {
            $('.showall').addClass('active');
            $('#editnav').addClass("active");
            $('.iconpopover').popover({
                container: 'body'
            })
        })

        $('.iconpopover').hover(function() {
            $(this).popover('toggle');
        });

        $(window).click(function() {
            if($('.new-contextmenu').is(":visible")) {
                $('.new-contextmenu').hide();
            }
        });

        $('#adminAddNew').on('show.bs.modal', function(e) {
            var modal = $(this);
            modal.find('input[value="Available"]').parent('label').addClass('active').click();
            // Assignee click event
            $('.assignee-drd').click(function () {
                var assignee_obj = $(this).data('assignee');
                var assignee_id = assignee_obj.id;
                $('input#assignee_id').val(assignee_obj.id);
                $('input#assignee').val(assignee_obj.name);
            })
        });

        $('#adminEditItem').on('show.bs.modal', function(e) {
            var modal = $(this);
            var button = $(e.relatedTarget);
            var item = button.data('itemdata');
            //set default for status dropdown
            console.log(item);
            if (item.status == "Reserved" || item.status == "ReturnPending" || item.status == "Borrowed") {
                modal.find('.btn-group').hide();
                modal.find('label[for="status"]').html("<strong>Item status:</strong>&nbsp;<em>This item cannot <b>change</b> status.</em>");
            } else {
                modal.find('.btn-group').show();
                modal.find('label[for="status"]').html("<strong>Item status:</strong>&nbsp;");
            }
            modal.find('input[value='+ item.status +']').parent('label').addClass('active').click();
            $('#status').val(item.status);
            $('#itemid').val(item.custom_id);
            $('#itemname').val(item.name);
            $('#location').val(item.location);
            $('#note').val(item.note);
            $('#bought_year').val(item.bought_year);

            if (item.users !== null) {
                $('input#assignee').val(item.users.name);
                $('input#assignee_id').val(item.users.id);
            }
            $('form#formForAdminEdit').attr('action','item/'+ item.id); 
            $('#formForAdminEdit').find('option[value="'+ item.category.id+'"]').prop("selected",true);
            // Assignee click event
            $('.assignee-drd').click(function () {
                var assignee_obj = $(this).data('assignee');
                var assignee_id = assignee_obj.id;
                $('input#assignee_id').val(assignee_obj.id);
                $('input#assignee').val(assignee_obj.name);
            })
        });

        var table = $('#tableItemAdmin').DataTable();

        $('.cate_hover').click(function(e){
            $('.showall').removeClass('active');
            $('.cate_hover').removeClass('active');
            // table.search($(this).children().find('label').html()).draw();
            table
            .columns( '.category' )
            .search( $(this).children().find('label').html(),false,true,false )
            .draw();

            $(this).addClass('active');
        });

        $('.showall').click(function(e){
            $('.showall').removeClass('active');
            $('.cate_hover').removeClass('active');
            table
            .columns( '.category' )
            .search('')
            .draw();

            $(this).addClass('active');
        });

        $('.categoryEdit').click(function(e){
            var category = $(this).data("category");
            $('#adminEditCategory').find('#name').val($(this).parent().find('label').html());
            $('#formForEditCategory').attr('action','category/'+category.id);
            $('#adminEditCategory').find('option[value="'+ category.rentable+'"]').prop("selected",true);
        });

        $('#button-new').click(function(e) {
            e.stopPropagation();
            $('.new-contextmenu').removeClass('invisible').show();
        });

        $('#categorySelector').change(function(){
            url = $(this).data('url');
            $.get(url, function(result) {
                toggle_loading();
                if (result.status == "ok") {
                    if ($('#modal-add-lo').length > 0) $('#modal-add-lo').remove();
                    content = result.content;
                    $("body").append(content);
                    $('#modal-add-lo').modal();
                    $('#modal-add-lo').modal('show');
                    $('#add-edit-lo-title').text(Lang.get('plan.title-header-add-lo'));
                }else {
                    $.notify(result.err_msg);
                }
            });
        });
    });
</script>

@stop
{{-- Include Modals --}}




