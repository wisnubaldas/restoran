@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Menu Pesanan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($category as $v)
                            <div class="col-4">
                                <x-adminlte-small-box title="{{ $v->jml }}" text="{{ $v->category }}"
                                    icon="{{ $v->icon }}" theme="teal" url="/create_menu_makanan"
                                    url-text="Tambah Menu" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
