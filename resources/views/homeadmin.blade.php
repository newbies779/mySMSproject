@extends('layouts.smslayout')

@section('tableContent')

	<div id="grid-body" class="col-sm-12">
		<div id="table-container" class="card card-block shadow">
			<h3 class="card-title text-xs-center">Request List</h3>
			<div class="table-responsive">
				@include('adminRentList')
			</div>
		</div>
	</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#table-admin').DataTable({
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

        $('.rentbtn').click(function () {
            console.log($(this).data('itemname'));
            console.log($(this).data('itemid'));
                // alert($(this).data('note'));
                $('#itemid').html($(this).data('itemid'));
                $('#itemname').html($(this).data('itemname'));

                var row = ($(this).data('row'));

                $("#itemtable1 #itemnote"+row).each(function(){
                    $('textarea#itemsnote').html($(this).html()); 
                    // console.log('itemsnote: ' + $('p#itemsnote').html());
                });

                $("#itemtable1 #itemid"+row).each(function(){
                    $('input#hiddenid').val($(this).html()); 
                    $('form#formforrent').attr('action','rent/'+$(this).html()); 
                });
                
                
                // console.log( 'testrent= ' + '/rents/'+$('input#hiddenid').val());

                $('#stack1').modal('hide');


                $('#stack2').on('hide.bs.modal', function () {
                    $('#stack1').modal('show');
                });

                //make modal still scrollable when one modal is closed
                $('.modal').on('hidden.bs.modal', function (e) {
                    if($('.modal').hasClass('in')) {
                        $('body').addClass('modal-open');
                    }    
                });

                
            });

        setTimeout(function() {
            $('#flash').fadeOut('slow');
            }, 3000); // <-- time in milliseconds

        $('.returnBtn').click(function () {

            var row = ($(this).data('row'));

            $('#itemidReturn').html($('#itemidforrent'+row).html());
            $('#itemnameReturn').html($('#tditemname'+row).html());

            $("#itemtable #itemnoteForReturn"+row).each(function(){
               console.log($(this));
                $('textarea#itemNoteReturn').html($(this).html()); 
                    // console.log('itemsnote: ' + $('p#itemsnote').html());
            });

            $("#itemtable #itemidForReturn"+row).each(function(){
                $('input#hiddenidReturn').val($(this).html()); 
                $('form#formforreturn').attr('action','return/'+$(this).html()); 
            });
        });
    });



</script>

@stop