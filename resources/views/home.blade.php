@extends('layouts.smslayout')

@section('header')
@include('flash')
@include('showerror')

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
<div id="grid-body" class="col-sm-10 offset-sm-1">
    <div id="table-container" class="card card-block shadow">
        <h3 class="card-title text-xs-center">Request List</h3>
            <div class="table-responsive">
    <table class="table table-hover" style="width: 100%;" cellspacing="0" id="itemtable">
        <thead>
            <tr>
                <th class="text-xs-left">#</th>
                <th class="text-xs-left">Item Name</th>
                <th class="text-xs-left">Date</th>
                <th class="text-xs-left">Time</th>
                <th class="text-xs-left">Rent Date</th>
                <th class="text-xs-left">Due Date</th>
                <th class="text-xs-left">Rent Status</th>
                <th class="text-xs-left">Return Status</th>
                <th class="text-xs-center">Action</th>
                <th style="display:none">note</th>
                <th style="display:none">itemid</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = $rentList->count(); ?>

            @foreach ($rentList as $rent)
            
            <tr>
                <td class="pos-left" scope="row"><strong> {{ $i }} </strong></td>
                <td class="pos-left" id="tditemname<?= $i; ?>">{{ $rent->item->name }}</td>
                <td class="pos-left">{{date('d/m/y', strtotime($rent->created_at))}}</td>
                <td class="pos-left">{{date('H:i', strtotime($rent->created_at))}}</td>
                <td class="pos-left">{{ date('d/m/y', strtotime($rent->rent_req_date))}}</td>
                <td class="pos-left" 
                <?php if(strtotime('now') >= strtotime($rent->return_date)) : ?>
                    style = "color:red"
                <?php endif ?>>
                    <?php if(!is_null($rent->return_date)) : ?>
                        {{ date('d/m/Y', strtotime($rent->return_date)) }}
                    <?php endif ?>
                </td> 
                <td class="pos-left"> 
                    @if ($rent->rent_status == "Approved")
                        <span class="tag tag-success">
                    @elseif ($rent->rent_status == "Pending")
                        <span class="tag tag-warning">
                    @endif
                    {{ $rent->rent_status }}</span></td> 
                <td class="pos-left">
                    @if ($rent->return_status == "Yes")
                        <span class="tag tag-success">
                        {{ $rent->return_status }}
                    @elseif ($rent->return_status == "Pending")
                        <span class="tag tag-warning">
                        {{ $rent->return_status }}
                    @elseif ($rent->return_status == "No")
                        {{-- <span class="tag tag-default"> --}}
                    @endif
                    </span>
                </td>

                <!-- Button trigger modal -->
                <td class="pos-left">
                    <button type="button" class="btn btn-primary btn-sm returnBtn"  data-toggle="modal" href="#stack3" data-row=" {{ $i }} " data-itemid="{{ $rent->item->custom_id }}" <?php if($rent->rent_status != "Approved" || $rent->return_status != "No" ) echo "disabled"; 
                        ?>>Return</button>
                    <button type="button" class="btn btn-primary btn-sm btn_show_delete" data-rent="{{ $rent }}" data-toggle="modal" href="#deleteModal" @if ($rent->rent_status != "Pending")
                        disabled 
                    @endif>delete</button>
                </td>
                    <td style="display:none" id="itemnoteForReturn<?= $i; ?>">{{  $rent->item->note }}</td>
                    <td style="display:none" id="itemidForReturn<?= $i--; ?>">{{  $rent->item->id }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>


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

    <!-- delete modal -->
    <div class="modal hide fade" id="deleteModal" tabindex="-1" role="dialog" data-focus-on="input:first" aria-labelledby="myDeleteModal" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4>Delete Comfirmation</h4>
                </div>
                <form action="" method="POST" id="formForDeleteRent">
                <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <h4>Are you sure you want to delete</h4>
                        <h4 id="askText"></h4>
                    </div>
                    <div class="modal-footer">
                        <span class="form-group">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <button class="btn btn-secondary" data-dismiss="modal">No</button>
                        </span>
                    </div>
                </form>
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
                 $('textarea#itemNoteReturn').html($(this).html()); 
                    // console.log('itemsnote: ' + $('p#itemsnote').html());
                });

                $("#itemtable #itemidForReturn"+row).each(function(){
                    $('input#hiddenidReturn').val($(this).html()); 
                    $('form#formforreturn').attr('action','return/'+$(this).html()); 
                });
            });

            $('.btn_show_delete').click(function () {
                var rent = $(this).data('rent');
                $('#askText').replaceWith("<h4 id='askText'><strong>" + rent.item.name + "</strong></h4>");
                $('#formForDeleteRent').attr('action','/rent/'+rent.id);

            });

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
             if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("RentDate").setAttribute("min", today);

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


