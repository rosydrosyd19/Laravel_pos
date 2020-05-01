<div class="table-responsive">
    <table class="table" id="purchases-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Pemasok</th>
                <th>Pengguna</th>
                <th>Total</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <tr>
                <td>{!! $purchase->id !!}</td>
                <td>{!! $purchase->supplier->name !!}</td>
                <td>{!! $purchase->user->name !!}</td>
                <td>{!! $purchase->total !!}</td>
                <td>
                    {!! Form::open(['route' => ['purchases.destroy', $purchase->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('purchases.show', [$purchase->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {{-- <a href="{!! route('purchases.edit', [$purchase->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
