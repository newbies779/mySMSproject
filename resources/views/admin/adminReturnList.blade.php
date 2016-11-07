<table class="table table-hover" style="width: 100%;" cellspacing="0" id="table-return-admin">
    <thead>
        <tr>
            <th class="text-xs-left">#</th>
            <th class="text-xs-left">Date</th>
            <th class="text-xs-left">Time</th>
            <th class="text-xs-left">User</th>
            <th class="text-xs-left">Item</th>
            <th class="text-xs-left">Return Date</th>
            <th class="text-xs-left" style="display:none;">Return Status</th>
            <th class="text-xs-left" style="display:none;">Return Action</th>
            <th style="display:none">notereturn</th>
            <th style="display:none">rentid</th>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1; ?>

        @foreach ($returns as $return)

            <tr>
                <td class="pos-left" scope="row"><b><?= $i ?></b></td>
                <td class="pos-left"> {{ date('d/m/y', strtotime($return->created_at))}} </td>
                <td class="pos-left">{{ date('H:i', strtotime($return->created_at))}}</td>
                <td class="pos-left">{{ $return->user->name }}</td>
                <td class="pos-left">{{ $return->item->name }}</td>
                <td class="pos-left"
                    <?php if(strtotime('now') >= strtotime($return->return_date)) : ?>
                        style = "color:red"
                    <?php endif ?>
                >
                    @if (!is_null($return->return_date))
                    {{ date('d/m/y', strtotime($return->return_date)) }}
                    @elseif(!is_null($return->return_req_date))
                    {{ date('d/m/y', strtotime($return->return_req_date)) }}
                    @endif
                </td>
                <td class="pos-left" style="display:none;">
                @if ($return->return_status == "Approved")
                    <span class="tag tag-success">
                    @elseif ($return->return_status == "Pending")
                    <span class="tag tag-warning">
                    @elseif (is_null($return->return_status))
                @endif
                    {{ $return->return_status }}
                    </span>
                </td>

                <!-- Button Return Approve -->
                <td class="pos-left">
                    <button type="button" class="btn btn-sm btn-warning return-approve"
                        data-toggle="modal"
                        data-target ="#returnApproveModal"
                        data-row="{{ $i }}"
                        data-rent = "{{ $return }}"
                        @if ($return->return_status != "Pending")
                        disabled
                        @endif
                    >
                        @if ($return->return_status != "Approved")
                        Approve
                        @else
                        Approved
                        @endif
                    </button>
                </td>

                    {{-- Hidden Information --}}
                <td style="display:none" id="noteForReturn{{ $i }}">{{  $return->item->return_req_note }}</td>
                <td style="display:none" id="rentId{{ $i++ }}">{{  $return->id }}</td>
            </tr>

        @endforeach
    </tbody>
</table>


