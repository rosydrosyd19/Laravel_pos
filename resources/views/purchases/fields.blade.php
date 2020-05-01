<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Pemasok:') !!}
    {!! Form::select('supplier_id', $suppliers, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Pengguna:') !!}
    {!! Form::text('user_id', auth()->user()->name, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control','readonly']) !!}
</div>

<div class="form-group col-md-12">
    <h4>Produk</h4>
    <div class="row">
        <div class="col-md-3">
            {!! Form::select('item_id',$items,null,['class'=>'form-control select-item','placeholder'=>'Pilih produk']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('price', null, ['class'=>'form-control','id'=>'price','placeholder'=>'Harga']) !!}
            <!-- {!! Form::text('stock', null, ['class'=>'form-control','id'=>'stock','placeholder'=>'Sisa Stock','readonly']) !!} -->
        </div>
        <div class="col-md-3">
            {!! Form::text('qty', null, ['class'=>'form-control','id'=>'qty','placeholder'=>'Jumlah']) !!}
            <!-- {!! Form::text('sub_total', null, ['class'=>'form-control','id'=>'sub_total','placeholder'=>'Sub Total','readonly']) !!} -->
        </div>
        <div class="col-md-3">
            <button class="btn  btn-sm btn-info" id="btn-tambah">Tambah</button>
        </div>
    </div>
 </div>
 <div class="form-group col-md-12">
    <h4><center>Daftar Pembelian</center></h4>
    <div class="row" style="border-bottom: 1px solid #eeeeee;margin-bottom: 15px;padding-bottom: 5px;">
        <div class="col-md-2"><center>No</center></div>
        <div class="col-md-2"><center>Nama</center></div>
        <div class="col-md-2"><center>Harga</center></div>
        <div class="col-md-2"><center>Qty</center></div>
        <div class="col-md-2"><center>Subtotal</center></div>
    </div>
    <div id="daftar-penjualan">
 
    </div>
 </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Batal</a>
</div>
