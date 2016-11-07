<?php
// dd($rentList);
$rentTable = $rentList->where('rent_status', 'Pending');
$returnTable = $rentList->where('return_status', 'Pending');
// dd($returnTable);

// @include('admin.adminReturnList', ['some' => 'data'])
    // @include('view.name', ['some' => 'data'])
?>
{{-- Tab Content --}}

<div class="tab-pane fade" id="rent" role="tab">
    @include('admin.adminRentList', ['rents' => $rentTable])
</div>
<div class="tab-pane fade" id="return" role="tab">
    @include('admin.adminReturnList', ['returns' => $returnTable])
</div>
<div class="tab-pane fade" id="history" role="tab">

</div>

{{-- Modal --}}
@include('modals.showModalApprove')

@section('script')
    <script>
        $(document).ready(function() {
            var tab_wrapper = $('.card-header-tabs');
            var current;
            var showTab = function() {
                tab_wrapper.find('a[href="#{{ $tab }}"]').tab('show');
            }

            function init_table() {
                setTimeout(function() {
                    $('#flash').fadeOut('slow');
                }, 3000); // <-- time in milliseconds

                (function(callback) {
                    // init data table
                    $('#table-rent-admin').DataTable({
                        "paging":   true,
                        "ordering": true,
                        "info":     true,
                        "pageLength": 10,
                        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                    });

                    $('#table-return-admin').DataTable({
                        "paging":   true,
                        "ordering": true,
                        "info":     true,
                        "pageLength": 10,
                        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                    });
                    // after that call callback function
                    callback();
                })(showTab);
            }

            function bind_events() {
                // on Modal rent approve show
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    var newTab = $(e.target).attr('href'); // newly activated tab
                    var oldTab = $(e.relatedTarget).attr('href'); // newly activated tab
                    setColor(newTab, oldTab);
                })
                $('#rentApproveModal').on('show.bs.modal', function(e) {
                    var modal = $(this);
                    var button = $(e.relatedTarget);
                    var rent = button.data('rent');
                    console.log(rent);
                    //console.log(rent.item.custom_id);
                    modal.find('#icustomId').text(rent.item.custom_id);
                    modal.find('#iname').text(rent.item.name);
                    modal.find('#istatus').text(rent.item.status);
                    modal.find('#inote').text(rent.rent_req_note);

                    modal.find('#formRentApprove').attr('action','rent/approve/'+rent.id);
                });
                // on Modal return approve show
                $('#returnApproveModal').on('show.bs.modal', function(e) {
                    var modal = $(this);
                    var button = $(e.relatedTarget);
                    var rent = button.data('rent');
                    //console.log(rent.item.custom_id);
                    modal.find('#rcustomId').text(rent.item.custom_id);
                    modal.find('#rname').text(rent.item.name);
                    modal.find('#rstatus').text(rent.item.status);
                    modal.find('#rnote').text(rent.return_req_note);

                    modal.find('#formReturnApprove').attr('action','return/approve/'+rent.id);
                });

                init_table();
            }
            function findColor(keyword) {
                if (keyword === '#rent') return 'primary';
                if (keyword === '#return') return 'warning';
            }
            function setColor(newTab, oldTab) {
                changeColorFrom(findColor(newTab),findColor(oldTab), function() {
                    console.log('changes success.');
                });
            }
            function changeColorFrom(newColor, oldColor, callback) {
                console.log(newColor);
                console.log(oldColor);
                $('.card-header').removeClass('bg-'+oldColor).addClass('bg-'+newColor);
                callback();
            }
            bind_events();
        });
    </script>
@stop

