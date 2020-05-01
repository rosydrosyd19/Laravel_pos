@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('sales.show_fields')
                    <a href="{!! route('sales.index') !!}" class="btn btn-default">Kembali</a>
                    <a href="/sales/{{$sale->id}}/cetak_pdf" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                    <a href="{!! route('sales.create') !!}" class="btn btn-primary"><i class="fa fa-edit"></i> Penjualan baru</a>
                </div>
            </div>
        </div>
    </div>
@endsection
