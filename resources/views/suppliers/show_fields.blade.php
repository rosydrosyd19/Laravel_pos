<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $supplier->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    <p>{!! $supplier->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $supplier->email !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'Kota:') !!}
    <p>{!! $supplier->city !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Alamat:') !!}
    <p>{!! $supplier->address !!}</p>
</div>

<!-- Handphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('handphone', 'No telepon:') !!}
    <p>{!! $supplier->handphone !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Dibuat Pada:') !!}
    <p>{!! $supplier->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $supplier->updated_at !!}</p>
</div>

