<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>No telepon</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Gender</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{!! $customer->name !!}</td>
            <td>{!! $customer->phone !!}</td>
            <td>{!! $customer->address !!}</td>
            <td>{!! $customer->email !!}</td>
            <td>{!! $customer->gender == 1 ? 'Laki - Laki' : 'Perempuan' !!}</td>
                <td>
                    {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('customers.show', [$customer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('customers.edit', [$customer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
