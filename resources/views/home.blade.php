@extends('layouts.smslayout')

@section('header')
@include('showerror')
@include('flash')

<div class="row">
    <div id="header-title" class="col-xs-12 col-sm-8">
        <h3>
            <strong>{{ $user->name }}'s</strong> Items List
        </h3>
    </div>
    <div id="header-button" class="col-xs-12 col-sm-4 pull-md-right">
     <!-- Button trigger modal -->
     <a role="button" class="btn btn-primary btn-block btn-circle shadow hvr-box-shadow-outset"  data-toggle="modal" href="#rentListModal">
        <span><b>Rent</b></span>           
    </a>
</div>
</div>

@include('modals.showAvailableItemModal')
@stop

@section('tableContent')
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="itemtable">
        <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Rent Date</th>
                <th>Due Date</th>
                <th>Rent Status</th>
                <th>Return Status</th>
                <th>Action</th>
                <th style="display:none">note</th>
                <th style="display:none">itemid</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = $rentList->count(); ?>

            @foreach ($rentList as $rent)

            <tr>
                <th class="pull-xs-right" scope="row"><?= $i ?></th>
                <td id="tditemname<?= $i; ?>">{{ $rent->item->name }}</td>
                <td>{{date('d/m/y', strtotime($rent->created_at))}}</td>
                <td>{{date('H:i', strtotime($rent->created_at))}}</td>
                <td>{{ date('d/m/Y', strtotime($rent->rent_req_date))}}</td>
                <td>
                    <?php if($rent->return_date != "") : ?>
                        {{ date('d/m/Y', strtotime($rent->return_req_date)) }}
                    <?php endif ?>
                </td> 
                <td style="<?php if($rent->rent_status == "Approved") echo "background-color: #e2ebf7";else echo "background-color: #fcf2e4;" ?>" >{{ $rent->rent_status }}</td> 
                <td style="<?php if($rent->return_status == "Yes") echo "background-color: #e0f3e7"; 
                    else echo "background-color: #d8d8d8"; ?> "> <?= $rent->return_status; ?>
                </td>

                <!-- Button trigger modal -->
                <td align="center">
                    <button type="button" class="btn btn-outline-primary returnBtn"  data-toggle="modal" href="#stack3" data-row="<?= $i ?>" data-itemid="{{ $rent->item->custom_id }}" <?php if($rent->rent_status != "Approved" || $rent->return_status != "No" ) echo "disabled"; 
                        ?>>Return</button>
                    </td>
                    <td style="display:none" id="itemnoteForReturn<?= $i; ?>">{{  $rent->item->note }}</td>
                    <td style="display:none" id="itemidForReturn<?= $i--; ?>">{{  $rent->item->id }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('showerror')


    <!-- Modal3 -->
    <div class="modal hide fade" id="stack3" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="myModalLabel3" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">

                    <button type="button" class="btn-close close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="itemidReturn"></h4>
                    <h4 class="modal-title" id="itemnameReturn"></h4>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="formforreturn">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="itemNoteReturn">item's note:</label>
                            <textarea name="itemNoteReturn" class="form-control" id="itemNoteReturn" rows="3" readonly >{{ old('itemNoteReturn') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="ReturnDate">Return Date <?= requireTxt(); ?>:</label>
                            <input type="date" name="ReturnDate" class="form-control" id="ReturnDate" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NoteReturn">Note <big>(Optional)</big>:</label>
                            <textarea name="NoteReturn" class="form-control" rows="4" id="NoteReturn" value="{{ old('NoteReturn') }}"></textarea>
                        </div>

                        <input type="text" name="hiddenidReturn" id="hiddenidReturn" value="" style="display:none">

                        <div class="form-group">
                            <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Return</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
    <script>
        $(document).ready(function() {
            $('table#itemtable').DataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
                "pageLength": 25,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "aaSorting": [[0,'desc']]
            }); 

            $('table#itemtable1').DataTable({
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

            $('#homenav').addClass("active");

            $('#RentConfirmModal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var item = button.data('item');
                console.log(item);
                $('#itemid').html(item.custom_id);
                $('#itemname').html(item.name);
                $('#itemsnote').html(item.note);
                $('form#formforrent').attr('action','rent/'+item.id);

                $('#rentListModal').modal('hide');

                //make modal still scrollable when one modal is closed
                $('.modal').on('hidden.bs.modal', function (e) {
                    if($('.modal').hasClass('in')) {
                        $('body').addClass('modal-open');
                    }    
                });
            });

            $('#RentConfirmModal').on('hide.bs.modal', function () {
                $('#rentListModal').modal('show');
            });

            

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

        (function(){

            var pusher = new Pusher('0384eeee590df2dd40c8', {
                cluster: 'ap1'
            });
            
            var channel = pusher.subscribe('rent_approve_listener');
            channel.bind('App\\Events\\AdminRentApprove', function(data) {
                console.log(data);
            });

        })();



    </script>

    @stop


