@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Datatables', true)

@section('content_header')
<h1 class="m-0 text-dark">Pesanan
    <a href="/home" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
</h1>

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- Setup data for datatables --}}
                    @php
                    $heads = [
                        'Nama',
                        ['label' => 'Phone', 'width' => 40],
                        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                    ];

                    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>';
                    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>';

                    $config = [
                        'data' => [
                            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        ],
                        'order' => [[1, 'asc']],
                        'columns' => [null, null, null, ['orderable' => false]],
                    ];
                    @endphp

{{-- Compressed with style options / fill data using the plugin config --}}
<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
    striped hoverable bordered compressed/>

            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        let cekOrder = function()
        {
            const cc = JSON.parse(sessionStorage.getItem('order'))
            if(cc)
            {
                console.log(cc)
            }
        }

        $(document).ready(function(){
            cekOrder()
        })
    </script>
@endsection