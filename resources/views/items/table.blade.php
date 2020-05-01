<div class="table-responsive">
    <table class="table" id="items-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Persediaan</th>
        <th>Kategori</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->price !!}</td>
            <td>{!! $item->description !!}</td>
            <!-- <td>{!! $item->picture !!}</td> -->
            <td><img width="70" height="50" src="{!! asset('images').'/'.$item->picture !!}"></td>
            <td>{!! $item->stock !!}</td>
            <td>{!! $item->category->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('items.show', [$item->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{!! route('items.edit', [$item->id]) !!}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                         'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
