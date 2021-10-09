
@extends('adminlte::page')

@section('title',  __('Forbidden'))

@section('content_header')
<h1 class="m-0 text-danger">Error......!!!!</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
            	<h1>403</h1>
                <h1>{{__($exception->getMessage() ?: 'Forbidden')}}</h1>
                <a href="/home" class="btn btn-danger btn-lg">Back</a>
            </div>
        </div>
    </div>
</div>
@stop