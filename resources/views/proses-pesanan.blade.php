
@extends('adminlte::page')

@section('title', 'Proses Pesanan')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('content_header')
<h1 class="m-0 text-dark">Proses Pesanan
    <div class="btn-group">
        <a href="/proses-pesanan/tambah-pesanan" class="btn bg-gradient-danger btn-sm">
            <i class="fas fa-bars"></i> Tambah Pesanan</a>
    </div>
</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @php
                $heads = [
                    'No',
                    'Pelayan',
                    'Pesanan',
                    'Jumlah',
                    'Meja',
                    'Action'
                ];

                $config = [
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp
                <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered compressed>
                @foreach($orders as $row)
                    <tr>
                        <td>{{$row->no_pesan}}</td>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->makanan}}</td>
                        <td>{{$row->jumlah_pesan}}</td>
                        <td>{{$row->meja}}</td>
                        <td>
                            <nobr>
                                <a class="btn btn-sm btn-default text-danger mx-1 shadow" href="/proses-pesanan/delete/{{$row->order_item_id}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </a>
                                <a class="btn btn-sm btn-default text-success mx-1 shadow" href="/proses-pesanan/selesai/{{$row->order_item_id}}">
                                    <i class="fas fa-check"></i>
                                </a>
                            </nobr>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
</div>
@stop