@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('plugins.Toastr', true)

@section('content_header')
<h1 class="m-0 text-dark">Menu Pesanan
    <div class="btn-group">
        <a href="/home" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
        <a href="/menu/lihat-pesanan" class="btn bg-gradient-success btn-sm"><i class="fas fa-hamburger"></i> 
            Liat Pesanan 
            <span class="badge badge-light">0</span>

        </a>
        <a href="/home" class="btn-add bg-gradient- btn-sm"><i class="add"></i> Tambah Menu Makanan</a>
    </div>
</h1>

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($menuMakanan as $v)
                    <div class="col-sm-4">
                        <div class="position-relative p-2 bg-gray" style="height: 180px; margin-bottom:15px;">
                            <div class="ribbon-wrapper ribbon-lg ribbon.text-lg">
                                <div class="ribbon bg-info">
                                    Rp {{number_format($v->price)}}
                                </div>
                            </div>
                            <img src="{{$v->foto}}" width="40%" alt="..." class="rounded float-left p-1">
                            <h6><strong>{{$v->product_category->code}}</strong> {{$v->name}}</h6>
                            <small>
                                Komposisi:<br>
                                <ul>
                                    <li>Kalori {{$v->product_detail->kalori}}%, Protein {{$v->product_detail->protein}}%</li>
                                    <li>Karbohidrat {{$v->product_detail->karbohidrat}}%, Lemak {{$v->product_detail->lemak}}%</li>
                                </ul>
                            </small>
                            <small>{{Str::limit($v->desc, 50)}}</small>
                            <div class="input-group mb-3">
                                <input type="number" id="jml-pesan" value="0" 
                                    data-id_item="{{$v->id}}" data-nama="{{$v->name}}" data-harga="{{$v->price}}"
                                    class="form-control rounded-0" min="0" max="100" 
                                    placeholder="Jumlah pesanan">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-info btn-flat btn-pesan">Pesan {{$v->name}}</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
                $('.badge-light').html(cc.length)
            }
        }
        let notifOrder = (a) => {
            toastr.success(a.nama+' pesan :'+a.jml_order)
        }
        $(document).ready(function(){
            cekOrder()

            $('.btn-pesan').on('click',function(a){
                const order = $(this).parent().parent().find('input');
                if(order.val() !== '0')
                {
                    let orderan = {
                        id:order.data('id_item'),
                        jml_order:order.val(),
                        menu_id:order.data('idItem'),
                        harga:order.data('harga'),
                        nama:order.data('nama')
                    }
                    let sessOrder = sessionStorage.getItem('order')
                    if(!sessOrder)
                    {
                        sessionStorage.setItem("order", JSON.stringify([orderan]));
                        cekOrder()
                        order.val(0);
                        notifOrder(orderan)
                    }else{
                        obj = JSON.parse(sessOrder);
                        obj.push(orderan)
                        sessionStorage.setItem("order", JSON.stringify(obj));
                        cekOrder()
                        order.val(0);
                        notifOrder(orderan)
                        
                    }
                }
            })
        })
    </script>
@endsection