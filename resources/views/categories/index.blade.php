@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Manajemen Kategori
        </h1>
    </section>

    <section class="content-header">
        <h1>
        </h1>
    </section>

    <section>
        <h4 class="col-sm-4">
            Tambah Kategori
        </h4>
        <h4 class="col-sm-8">
            List Kategori
        </h4>
    </section>


    <div class="col-sm-4">
    
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'categories.store']) !!}

                        @include('categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- daftar -->

    <div class="col-sm-8">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('categories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

