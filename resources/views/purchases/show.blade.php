@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pembelian
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('purchases.show_fields')
                    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Kembali</a>
                    <a href="/purchases/{{$purchase->id}}/cetak_pdf" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                    <a href="{!! route('purchases.create') !!}" class="btn btn-primary"><i class="fa fa-edit"></i> Pembelian baru</a>
                </div>
            </div>
        </div>
    </div>
@endsection
