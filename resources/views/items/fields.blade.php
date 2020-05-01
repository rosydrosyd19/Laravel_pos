<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>
<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Gambar:') !!}
    {!! Form::file('picture') !!}
</div>
<div class="clearfix"></div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Persediaan:') !!}
    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Kategori:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Pilih Kategori']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('items.index') !!}" class="btn btn-default">Batal</a>
</div>
