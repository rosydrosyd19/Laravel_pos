<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id barang:') !!}
    <p>{!! $item->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    <p>{!! $item->name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    <p>{!! $item->price !!}</p>
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Persediaan:') !!}
    <p>{!! $item->stock !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('category_id', 'Kategori:') !!}
    <p>{!! $item->category->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Deskripsi:') !!}
    <p>{!! $item->description !!}</p>
</div>

<!-- Picture Field -->
<div class="form-group col-sm-12">
    {!! Form::label('picture', 'Gambar:') !!}
    <p><img width="300" height="200" src="{!! asset('images').'/'.$item->picture !!}"></p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $item->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $item->updated_at !!}</p>
</div>


