@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Menu Pesanan
    <div class="btn-group">
        <a href="/home" class="btn bg-gradient-danger btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
        <a href="#" class="btn bg-gradient-success btn-sm"><i class="fas fa-hamburger"></i> Liat Pesanan</a>
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
                                <input type="number" class="form-control rounded-0" placeholder="Jumlah pesanan">
                                <span class="input-group-append">
                                  <button type="button" class="btn btn-info btn-flat">Pesan {{$v->name}}</button>
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