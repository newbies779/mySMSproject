<table class="table table-hover" style="width: 100%; cellspacing="0" id="table-rent-admin">
    <thead>
        <tr>
            <th class="text-xs-left">#</th>
            <th class="text-xs-left">Date</th>
            <th class="text-xs-left">Time</th>
            <th class="text-xs-left">User</th>
            <th class="text-xs-left">Item</th>
            <th class="text-xs-left">Rent Date</th>
            <th class="text-xs-left">Rent Status</th>
            <th class="text-xs-left">Rent Action</th>
            <th style="display:none">noterent</th>
            <th style="display:none">rentid</th>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1; ?>
        {{-- {{ dd($rentList->where('rent_status', 'Pending')) }} --}}
        @foreach ($rents as $rent)
        <tr>
            <td class="pos-left" scope="row"><b><?= $i ?></b></td>
            <td class="pos-left"> {{ date('d/m/y', strtotime($rent->created_at))}} </td>
            <td class="pos-left">{{ date('H:i', strtotime($rent->created_at))}}</td>
            <td class="pos-left">{{ $rent->user->name }}</td>
            <td class="pos-left">{{ $rent->item->name }}</td>
            <td class="pos-left"> {{ date('d/m/y', strtotime($rent->rent_req_date))}} </td>
            <td class="pos-left">
                @if ($rent->rent_status == "Approved")
                <span class="tag tag-success">
                    @elseif ($rent->rent_status == "Pending")
                    <span class="tag tag-warning">
                        @endif
                        {{ $rent->rent_status }}</span>
                    </td>
                    <td class="pos-left
                    @if (strtotime('now') >= strtotime($rent->return_date))
                    text-danger"
                    @endif
                    >
                    @if (!is_null($rent->return_date))
                    {{ date('d/m/y', strtotime($rent->return_date)) }}
                    @elseif(!is_null($rent->return_req_date))
                    {{ date('d/m/y', strtotime($rent-> return_req_date)) }}
                    @endif
                </td>
                <!-- Button Rent Trigger Modal -->

                <td class="pos-left">
                    <button type="button" class="btn btn-sm btn-primary rent-approve"
                    data-toggle="modal"
                    data-target ="#rentApproveModal"
                    data-row="<?= $i ?>"
                    data-rent = "{{ $rent }}"
                    data-rentItem = "{{ $rent->item }}"
                    @if ($rent->rent_status === "Approved")
                    disabled
                    @endif
                    >
                    @if ($rent->rent_status == "Pending")
                    Approve
                    @else
                    Approved
                    @endif
                </button>
            </td>

            {{-- Hidden Information --}}
            <td style="display:none" id="noteForRent{{ $i }}">{{  $rent->item->rent_req_note }}</td>
            <td style="display:none" id="rentId{{ $i++ }}">{{  $rent->id }}</td>
        </tr>

        @endforeach

    </tbody>
</table>
