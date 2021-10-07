@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row">
    <div class="col-4 col-auto mr-auto">
        <h1 class="m-0 text-dark">Pesanan</h1>        
    </div>
    <div class="col-6 col-auto">
        <div class="input-group input-group-sm mb-3">
            <a href="/home" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
                <select class="custom-select form-control-border form-control-sm border-width-2" 
                id="meja-select" autocomplete="off">
                    <option selected="" value="">Pilih Meja</option>
                    @foreach($mejas as $meja)
                        <option value="{{$meja->code}}">{{$meja->code}}</option>
                    @endforeach
                  </select>
                <button id="frm-bayar" class="btn bg-gradient-warning btn-sm">
                    <i class="fas fa-file-invoice-dollar"></i> Total Bayar Rp. <span id="total-bayar"></span>
                </button>
        </div>
    </div>
</div>

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- Setup data for datatables --}}
                    @php
                    $heads = [
                        '#',
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
        let ajaxBayar = function(d) {
            $.ajax({
                url:'/menu/bayar',
                method:'POST',
                dataType: 'json',
                data:{
                        "data":JSON.stringify(d)
                },
            }).done(function(a){
                console.log(a);
            }).fail(function(error) {
                console.log(error.statusText)
            })
        }
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
                    dataSet.push([y.id,y.nama,y.harga,y.jml_order,btnDelete(y.id)])
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
                let dataRow = table.rows().data();
                const meja = $('#meja-select').val();
                    if(meja != '')
                    {
                        f = [];
                        dataRow.map((a)=>{
                            let b = {}
                            b.products_id = a[0];
                            b.meja = meja;
                            b.nama = a[1];
                            b.harga = a[2];
                            b.jumlah = a[3];
                            f.push(b)
                        })
                        
                       ajaxBayar(f)
                    }
                    
            })
        })

    </script>
@endsection