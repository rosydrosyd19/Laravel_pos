@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pemasok
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('suppliers.show_fields')
                    <a href="{!! route('suppliers.index') !!}" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
