@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<h1 class="m-0 text-dark">Pesanan
    <a href="/home" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
        <button id="frm-bayar" class="btn bg-gradient-warning btn-sm">
            <i class="fas fa-file-invoice-dollar"></i> Total Bayar Rp. <span id="total-bayar"></span>
        </button>


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
                        ['label' => 'Harga', 'width' => 10],
                        ['label' => 'Jumlah', 'width' => 10],
                        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                    ];

                    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>';
                    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" onclick="deleteOrder()" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>';

                    $config = [
                        'data' => [
                            
                        ],
                        'order' => [[1, 'asc']],
                        'columns' => [null, null, null, ['orderable' => false]],
                        'searching'=> false,
                        "lengthChange"=> false,
                        'paging'=> false,
                    ];
                    @endphp
{{-- Compressed with style options / fill data using the plugin config --}}
<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
    striped hoverable bordered compressed with-buttons/>

            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        let btnDelete = function(a) {
            return `<button class="btn btn-xs btn-default text-danger mx-1 shadow delete-order" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>`
        }


        let cekOrder = function()
        {
            let harga = 0;

            let dataSet = [];
            const cc = JSON.parse(sessionStorage.getItem('order'))
            if(cc)
            {
                for (y of cc) {
                    harga = harga+y.harga;
                    dataSet.push([y.nama,y.harga,y.jml_order,btnDelete(y.id)])
                }
                $('#total-bayar').html(harga)
            }
            return dataSet;
        }

        $(document).ready(function(){
            // cekOrder()
            let table = $('#table2').DataTable( {
                data:cekOrder(),
                searching:false,
                lengthChange:false,
                paging:false,
                destroy: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Reload',
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                        }
                    }
                ]
            } );

            $('#table2 tbody').on( 'click', '.delete-order', function () {
                table
                    .row( $(this).parents('tr') )
                    .remove()
                    .draw();
            } );

            $('#frm-bayar').on('click',function(){
                let data = table
                            .rows()
                            .data();
                data.map(function(a){
                    console.log(a)
                })
            })
        })

    </script>
@endsection