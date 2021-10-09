
@extends('adminlte::page')

@section('title', 'Status Pesanan')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('content_header')
<h1 class="m-0 text-dark">Pesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @php

                $config = [
                    'processing' => true,
                    'serverSide' => true,
                    'ajax' => "/status-pesan",
                    'columns' => [
                        ['data'=>'no_pesan'],
                        ['data'=>'start'],
                        ['data'=>'finish'],
                        ['data'=>'jml_pesan'],
                        ['data'=>'status'],
                    ],
                ];
                $heads = [
                    'No',
                    'Start',
                    'Finish',
                    'Jumlah Pesanan',
                    'Status',
                ];
                @endphp

                <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
                striped hoverable bordered compressed/>
            </div>
        </div>
    </div>
</div>
@stop