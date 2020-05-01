<div class="table-responsive">
    <table class="table" id="sales-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama pembeli</th>
        <th>Total</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
            <td>{!! $sale->id !!}</td>
                <td>{!! $sale->customer->name !!}</td>
                <td>{!! $sale->total !!}</td>
                <td>
                    {!! Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('sales.show', [$sale->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {{-- <a href="{!! route('sales.edit', [$sale->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
