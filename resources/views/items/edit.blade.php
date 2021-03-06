@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Produk
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'patch','files'=>true]) !!}

                        @include('items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection