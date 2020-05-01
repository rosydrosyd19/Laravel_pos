<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id pelanggan:') !!}
    <p>{!! $customer->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    <p>{!! $customer->name !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'No telepon:') !!}
    <p>{!! $customer->phone !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Alamat:') !!}
    <p>{!! $customer->address !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $customer->email !!}</p>
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{!! $customer->gender == 1 ? 'Laki - Laki' : 'Perempuan' !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $customer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $customer->updated_at !!}</p>
</div>

