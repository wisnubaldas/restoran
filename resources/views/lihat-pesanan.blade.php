@extends('adminlte::page')

@section('title', 'AdminLTE')

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

            $('.btn-pesan').on('click',function(a){
                const order = $(this).parent().parent().find('input');
                if(order.val() !== '0')
                {
                    let orderan = {
                        jml_order:order.val(),
                        menu_id:order.data('item')
                    }
                    let sessOrder = sessionStorage.getItem('order')
                    if(!sessOrder)
                    {
                        sessionStorage.setItem("order", JSON.stringify([orderan]));
                        cekOrder()
                    }else{
                        obj = JSON.parse(sessOrder);
                        obj.push(orderan)
                        sessionStorage.setItem("order", JSON.stringify(obj));
                        cekOrder()
                    }
                }
            })
        })
    </script>
@endsection