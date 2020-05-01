@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Hi, {!! Auth::user()->name !!}</h2>
            <span>Login terakhir {!!Auth::user()->created_at->format(\Carbon\Carbon::now())!!}</span>
        </div>
    </div>
</div>
@endsection
